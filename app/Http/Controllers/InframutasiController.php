<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Inframutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Services\Infra\InfraService;
use Services\Inframutasi\InframutasiService;

class InframutasiController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->role != 'admin'){
            $mutasis = Inframutasi::whereHas('infra', function ($m) {
                    return $m->where('gudang_id',auth()->user()->gudang_id);
            })->groupby('kode_mutasi')->orderByDesc('created_at')->paginate(30);
        }else{
            if($request->mutasi != null){
                $mutasis = Inframutasi::where('id',$request->mutasi)->groupby('kode_mutasi')->orderByDesc('created_at')->paginate(30);
            }else{
                $mutasis = Inframutasi::groupby('kode_mutasi')->orderByDesc('created_at')->paginate(30);

            }
        }
        return view('infra.mutasi.list', compact('mutasis'));
    }
    public function create()
    {
        $gudang = Gudang::get(['id','name']);
        $zz = Inframutasi::where('kode_mutasi',Cookie::get('kodeInfra'));
        $b = (clone $zz)->count();
        if($zz->exists()){
            $g = (clone $zz)->first()->gudang;
            $gud = (clone $zz)->get();
        }else{
            $gud = [];
            $g = 'null';
        }
        return view('infra.mutasi.create',compact(['g','b','gudang','gud']));
    }
    public function reset()
    {
       $c = Cookie::forget('kodeInfra');
       return redirect()->back()->withCookie($c);
    }
    public function store(Request $request)
    {
        $data = InframutasiService::find($request->kode,'ready',auth()->user()->gudang_id);
        if ($data == null){
            toastr()->warning('Tidak ditemukan');
             return redirect()->back();
        }
        if ($data->status == 'nonaktif' || $data->status == 'mutasi'){
            toastr()->warning('barang masih nonaktif/telahh termutasi'); 
            return redirect()->back();
        }
        $c = DB::transaction(function() use($data,$request){
            InfraService::status($data, 'mutasi');
            $c = InframutasiService::store($request, $data->id);
            return $c;
        });
        toastr()->success('Berhasil');
        return redirect()->back()->cookie($c);
    }
    public function invoice($id)
    {
        $mutasi = Inframutasi::where('kode_mutasi',$id)->get();
        return view('infra.mutasi.invoice',compact('mutasi'));
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
        toastr()->success('Berhasil');
        return redirect()->back();
    }
    public function delete(Inframutasi $id)
    {
        $id->delete();
        InfraService::status($id->infra(), 'ready');
        toastr()->success('Berhasil');

        return redirect()->back();
    }
    public function terima()
    {
        return view('infra.mutasi.terima');
    }
    public function terimaa(Request $request)
    {
       
            $b = InframutasiService::find($request->kode,'mutasi');
            if($b == null || (auth()->user()->gudang_id == $b->gudang_id) || ($b->inframutasi->status != 'proses')){
            toastr()->warning('status barang bukan mutasi/gudang penerima salah'); 
                
                return redirect()->back();
            }
            InframutasiService::masuk($b);
        toastr()->success('Berhasil');

            return redirect()->back();
    }
}