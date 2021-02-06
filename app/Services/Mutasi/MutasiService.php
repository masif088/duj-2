<?php

namespace Services\Mutasi;

use App\Models\Mutasi;
use Illuminate\Support\Str;

class MutasiService
{
    static public function store($data,$b)
    {   
        $data = Mutasi::create([
            'gudang_id' => $data->gudang,
            'barcode_id' => $b,
            'kode_mutasi' => Str::random(6),
        ]);
        return $data;
    }
}