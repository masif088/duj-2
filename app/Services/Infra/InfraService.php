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
            'name' => $data->name,
            'kode' => Str::random(6),

        ]);
        return $data;
    }
    static public function update($data,$id)
    {
        $id->update([
            'name' => $data->name,
        ]);
        return true;
    }
}