<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Services\UserService;

class UserController extends Controller
{
    public function create()
    {
        return view('backend.user');
    }
    public function store(StoreUserRequest $request)
    {
        
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'sidik' => $request->sidik,
        ]);
        return $data;
    }
    public function update(Request $request,User $user)
    {
       if($request->password){
        $user->update([
            'password' => bcrypt($request->password),
        ]);
       }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'sidik' => $request->sidik,
        ]);
        
    }
}
