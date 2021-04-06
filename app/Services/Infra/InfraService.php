<?php

namespace Services\Infra;

use App\Models\Infra;
use Illuminate\Support\Str;

class InfraService
{
    static public function store($data)
    {   
        $data = Infra::create([
            'user_id' => auth()->user()->id,
            'gudang_id' => auth()->user()->gudang_id,
            'name' => $data->name,
            'kode' => Str::random(6).'_'.$data->gudang,

        ]);
        return $data;
    }
    static public function update($data,$id)
    {
        $id->update([
            'gudang_id' => auth()->user()->gudang_id,
            'name' => $data->name,
        ]);
        return true;
    }
    static public function status($id,$s)
    {
        $id->update([
           'status' => $s
        ]);
        return true;
    }
}