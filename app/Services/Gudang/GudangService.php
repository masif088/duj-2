<?php

namespace Services\Gudang;

use App\Models\Gudang;

class GudangService
{
    static public function store($data)
    {   
        $data = Gudang::create([
            'name' => $data->name,
        ]);
        return $data;
    }
    static public function update($data,$gudang)
    {   
        $gudang->update([
            'name' => $data->name,
        ]);
        return $data;
    }
}