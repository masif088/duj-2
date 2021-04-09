<?php

namespace Services\Inframutasi;

use App\Models\Infra;
use App\Models\Inframutasi;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class InframutasiService
{
    static public function store($data,$b)
    {   
        // $log = new LogController;
        if(is_null(Cookie::get('kodeInfra'))){
            $coki = 0;
            do {
                $rk = Str::random(5+$coki);
                $c = cookie("kodeInfra", $rk, 60000);
                $coki+=1;
            }while (Inframutasi::where('kode_mutasi',$rk)->exists());
            
        }else{
            $rk = Cookie::get('kodeInfra');
            $c = cookie("kodeInfra", $rk, 60000);
            $dd = Inframutasi::where('kode_mutasi',$rk)->first();
            $data['gudang'] = $dd->gudang_id ?? $data->gudang;
            
        }
        $m = Inframutasi::create([
            'user_id' => auth()->user()->id,
            'gudang_id' => $data->gudang,
            'infra_id' => $b,
            'kode_mutasi' => $rk,
            ]);
            // if(is_null(Cookie::get('kodeInfra'))){
            //     $log->create('membuat mutasi #'.$rk,'mutasi',$m->id);
            
            // }
        return $c;
    }
    static public function batal($data)
    {
        // $log = new LogController;

        $data->update([
            'status' => 'batal',
        ]);
        // $log->create('membatalkan mutasi #'.$data->kode_mutasi,'mutasi',$data->id);

        return true;
    }
    static public function find($d,$status = null,$gudang = null)
    {   
        $data = Infra::where('kode',$d);
        if($status != null){
           $data = $data->where('status',$status);
        }
        if($gudang != null){
            $data = $data->where('gudang_id',$gudang);
        }
        $data = $data->latest()->first();
        
        return $data;
    }
    static public function masuk($data)
    {   
        $data->inframutasi()->update([
            'status' => 'selesai'
        ]);
        $data = Infra::create([
            'user_id' => auth()->user() == null ? auth('sanctum')->user()->id : auth()->user()->id,
            'gudang_id' => auth()->user() == null ? auth('sanctum')->user()->gudang_id : auth()->user()->gudang_id,
            'name' => $data->name,
            'kode' => $data->kode,
            'status' => 'ready'
        ]);
        
        return $data;
    }
}