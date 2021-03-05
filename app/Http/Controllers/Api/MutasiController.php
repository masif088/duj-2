<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mutasi\StoreRequest;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Services\Barcode\BarcodeService;
use Services\Mutasi\MutasiService;
use Illuminate\Support\Str;


class MutasiController extends Controller
{
    public function gudang()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Gudang::get()
        ],200);
    }

    public function riwayat()
    {
        $mutasi = Mutasi::whereHas('barcode', function ($m) {
            return $m->whereHas('masuk', function($z){
                return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
            });
        });
        $m = (clone $mutasi)->select('created_at', DB::raw('count(*) as total'))
        ->groupBy('created_at')
        ->get();;
        $mutasi = (clone $mutasi)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $mutasi,
            'count' => $m
        ],201);
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return response()->json([
                'status' => 'error',
                'data' => $request->validator->messages(),
            ],400);
        }
        $data = BarcodeService::find($request->kode,'aktif');
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif' || $data->status == 'mutasi') return 'barang masih nonaktif/telahh termutasi';
        $c = DB::transaction(function() use($data,$request){
            BarcodeService::update($data, 'mutasi');
            if(is_null($request->kodeMts)){
                $coki = 0;
                do {
                    $rk = Str::random(5+$coki);
                    $c = $rk;
                    $coki+=1;
                }while (Mutasi::where('kode_mutasi',$rk)->exists());
            }else{
                $rk = $request->kodeMts;
                $c = $rk;
                $dd = Mutasi::where('kode_mutasi',$rk)->first();
                $request['gudang'] = $dd->gudang_id ?? $request->gudang;
            }
            Mutasi::create([
                'user_id' => auth('sanctum')->user()->id,
                'gudang_id' => $request->gudang,
                'barcode_id' => $request->id,
                'kode_mutasi' => $rk,
            ]);
            return $c;
        });
        $zz = Mutasi::where('kode_mutasi',$request->kodeMts);
        if($zz->exists()){
            $b = (clone $zz)->count();
            $g = (clone $zz)->first()->gudang->name;
        }else{
            $b = null;
            $g = null;
        }
        return response()->json([
            'status' => 'ok',
            'kodeMts' => $c,
            'scaned' => $b,
            'gudang' => $g,
        ],201);
    }
    public function batal(Mutasi $id)
    {
        DB::transaction(function() use($id){
            MutasiService::batal($id);
            BarcodeService::update($id->barcode(), 'aktif');
        });
        return response()->json([
            'status' => 'ok'
        ],200);
    }
    public function detail(Request $request)
    {
        $b = Barcode::where('kode',$request->kode)->where('status','aktif')->with(['masuk' => function($xx){
            $xx->with(['barang','gudang','suplier']);
        },'mutasi'])->latest()->first();
        if($b == null || $b->masuk->gudang_id != auth('sanctum')->user()->gudang_id){
        return response()->json([
            'status' => 'error',
            'msg' => 'barcode tidak ditemukan'
        ],400);
        }
        return response()->json([
            'status' => 'ok',
            'data' => $b
        ],200);
    }
}
