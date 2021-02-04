<?php

namespace Services;

use App\Models\User;

class UserService
{
    static public function store($data)
    {   
        $fileName = null;
        $data = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'img' => $fileName,
            'alamat' => $data->alamat,
            'no_hp' => $data->no_hp,
            'role' => 'admin',
            'sidik' => $data->sidik,
        ]);
        return redirect()->back();

    }
}

 // if(isset($request->validator) && $request->validator->fails()){
        //     return redirect()->back()->withErrors($request->validator->messages());
        // }