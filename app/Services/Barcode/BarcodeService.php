<?php
namespace Services\Barcode;

use App\Models\Barcode;

class BarcodeService
{
    static public function store($data)
    {   
        $data->barcode()->create([
            'kode' => mt_rand(10000000, 99999999),
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
    static public function find($data)
    {   
        $data = Barcode::where('kode',$data)->first();
        return $data;
    }
}