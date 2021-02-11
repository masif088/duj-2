<?php

namespace Services\Mutasi;

use App\Models\Mutasi;
use Illuminate\Support\Str;

class MutasiService
{
    
    static public function store($data,$b)
    {   
        $data = Mutasi::create([
            'user_id' => auth()->user()->id,
            'gudang_id' => $data->gudang,
            'barcode_id' => $b,
            'kode_mutasi' => Str::random(6),
        ]);
        return $data;
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
        $data->update([
            'status' => 'batal',
        ]);
        return true;
    }
}