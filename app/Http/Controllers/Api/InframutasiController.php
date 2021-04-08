<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inframutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Services\Inframutasi\InframutasiService;
use Illuminate\Support\Str;
use Services\Infra\InfraService;

class InframutasiController extends Controller
{
    public function index()
    {
        $mutasis = Inframutasi::whereHas('infra', function ($m) {
            return $m->where('gudang_id',auth('sanctum')->user()->gudang_id);
    })->orderByDesc('created_at')->with(['gudang','infra.gudang'])->get();
    return response()->json([
        'status' => 'ok',
        'data' => $mutasis
    ],201);
    }
    public function store(Request $request)
    {
      
        $data = InframutasiService::find($request->kode,'ready',auth('sanctum')->user()->gudang_id);

        if ($data == null) return 'tidak ditemukan';
        $c = DB::transaction(function() use($data,$request){
            InfraService::status($data, 'mutasi');

            if(is_null($request->kodeMutasi)){
                $coki = 0;
                do {
                    $rk = Str::random(5+$coki);
                    $c = $rk;
                    $coki+=1;
                }while (Inframutasi::where('kode_mutasi',$rk)->exists());
            }else{
                $rk = $request->kodeMutasi;
                $c = $rk;
                $dd = Inframutasi::where('kode_mutasi',$rk)->first();
                $request['gudang'] = $dd->gudang_id ?? $request->gudang;
            }
            $m = Inframutasi::create([
                'user_id' => auth('sanctum')->user()->id,
                'gudang_id' => $request->gudang,
                'infra_id' => $data->id,
                'kode_mutasi' => $rk,
                ]);

            // $this->log->create('membuat mutasi #'.$rk,'mutasi',$m->id);

            return $c;
        });
        $zz = Inframutasi::where('kode_mutasi',$c);
        if($zz->exists()){
            $b = (clone $zz)->count();
            $g = (clone $zz)->first()->gudang->name;
        }else{
            $b = null;
            $g = null;
        }
        return response()->json([
            'status' => 'ok',
            'kodeMutasi' => $c,
            'scaned' => $b,
            'gudang' => $g,
        ],201);
    }
    public function delete(Inframutasi $id)
    {
        $id->delete();
        InfraService::status($id->infra(), 'ready');
        return response()->json([
            'status' => 'ok',
        ],200);
    }
    public function batal(Inframutasi $id)
    {
        DB::transaction(function() use($id){
            $m = Inframutasi::where('kode_mutasi',$id->kode_mutasi)->get();
            foreach ($m as $idd) {
                InframutasiService::batal($idd);
                InfraService::status($idd->infra(), 'ready');
            }
            // $this->log->create('membatalkan mutasi #'.$idd->kode,'mutasi',$idd->id);

        });
        return response()->json([
            'status' => 'ok',
        ],200);
    }
    public function terima(Request $request)
    {
            $b = InframutasiService::find($request->kode,'mutasi');
            if($b == null || (auth('sanctum')->user()->gudang_id == $b->gudang_id) || ($b->inframutasi->status != 'proses')){
          
            return response()->json([
                'status' => 'error',
                'msg' => 'status barang bukan mutasi/gudang penerima salah'
            ],400);
            }
            InframutasiService::masuk($b);
            return response()->json([
                'status' => 'ok',
            ],200);
    }
}
