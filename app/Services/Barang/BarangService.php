<?php

namespace Services\Barang;

use App\Models\Barang;

class BarangService
{
    static public function store($data)
    {   
        $data = Barang::create([
            'name' => $data->name,
        ]);
        return $data;
    }
  
}