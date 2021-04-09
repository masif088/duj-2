<?php
namespace Services\Barcode;

use App\Models\Barcode;

class BarcodeService
{
    static public function store($data)
    {   
        $data->barcode()->create([
            'user_id' => auth('sanctum')->user() == null ? auth()->user()->id : auth('sanctum')->user()->id,
            'kode' => $data->kode_akuntan.'_'.mt_rand(10000000, 99999999),
        ]);
        return true;
    }
    static public function update($data,$status)
    {   
        $data->update([
            'status' => $status,
        ]);
        return $data;
    }
    static public function find($d,$status = null,$gudang = null)
    {   
        $data = Barcode::where('kode',$d);
        if($status != null){
            $data = $data->where('status',$status);
        }
        if($gudang != null){
            $data = $data->whereHas('masuk',function($x) use($gudang){
                return $x->where('gudang_id',$gudang);
            });
        }
        $data = $data->latest()->first();
        
        return $data;
    }
}