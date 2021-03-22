<?php

namespace Services\Mutasi;

use App\Http\Controllers\LogController;
use App\Models\Mutasi;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class MutasiService
{
    
    static public function store($data,$b)
    {  
        $log = new LogController;
        if(is_null(Cookie::get('kodeMts'))){
            $coki = 0;
            do {
                $rk = Str::random(5+$coki);
                $c = cookie("kodeMts", $rk, 60000);
                $coki+=1;
            }while (Mutasi::where('kode_mutasi',$rk)->exists());
            
        }else{
            $rk = Cookie::get('kodeMts');
            $c = cookie("kodeMts", $rk, 60000);
            $dd = Mutasi::where('kode_mutasi',$rk)->first();
            $data['gudang'] = $dd->gudang_id ?? $data->gudang;
            
        }
        $m = Mutasi::create([
            'user_id' => auth()->user()->id,
            'gudang_id' => $data->gudang,
            'barcode_id' => $b,
            'kode_mutasi' => $rk,
            ]);
            if(is_null(Cookie::get('kodeMts'))){
                $log->create('membuat mutasi #'.$rk,'mutasi',$m->id);
            
            }
        return $c;
    }
    static public function update($data,$b,$gudang)
    {   
        $data->update([
            'barcode_id' => $b,
            'gudang_id' => $gudang
        ]);
        return true;
    }
    static public function batal($data)
    {
        $log = new LogController;

        $data->update([
            'status' => 'batal',
        ]);
        $log->create('membatalkan mutasi #'.$data->kode_mutasi,'mutasi',$data->id);

        return true;
    }
}