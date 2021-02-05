<?php

namespace Services\User;

use App\Models\User;

class UserService
{
    static public function store($data)
    {   
        $fileName = null;
        if ($data->file('img') != null) {
            $file = $data->file('img');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $data->file('img')->storeAs('public/user/',$fileName);
        }
        $data = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'img' => $fileName,
            'alamat' => $data->alamat,
            'no_hp' => $data->no_hp,
            'role' => $data->role,
            'sidik' => $data->sidik,
        ]);
        return $data;
    }
    static public function edit($request,$user)
    {
        if($request->password){
            $user->update([
                'password' => bcrypt($request->password),
            ]);
           }
           $fileName = null;
        if ($request->file('img') != null) {
            $file = $request->file('img');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $request->file('img')->storeAs('public/user/',$fileName);
        }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'role' => $request->role,
                'sidik' => $request->sidik,
            ]);
            return true;
    }
}