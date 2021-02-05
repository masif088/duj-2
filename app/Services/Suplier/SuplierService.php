<?php

namespace Services\Suplier;

use App\Models\Suplier;

class SuplierService
{
    static public function store($data)
    {   
        $data = Suplier::create([
            'name' => $data->name,
            'no_hp' => $data->no_hp,
            'alamat' => $data->alamat
        ]);
        return $data;
    }
}