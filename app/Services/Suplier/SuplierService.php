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
    static public function update($request,$data)
    {   
        $data->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);
        return $data;
    }
}