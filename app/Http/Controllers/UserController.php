<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Services\User\UserService;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profil',compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit($id)
    {
        return view('backend.user',compact('id'));
    }
    public function store(StoreUserRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            $request->flash();
            return redirect()->back()->withErrors($request->validator->messages());
        }
        if(auth()->user()->role == 'admin'){
            if(!in_array($request->role,['admin','head','teknisi'])){
                dd('haloo');
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'head'){
            if($request->role != 'ketua'){
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'ketua'){
            if($request->role != 'checker'){
                return redirect()->back();
            } 
        }else{
            return redirect()->back();
        }
        UserService::store($request);
        return redirect()->back();
    }
    public function update(UpdateRequest $request,User $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            $request->flash();
            dd($request->validator->messages());
            return redirect()->back()->withErrors($request->validator->messages());
        }
        if(auth()->user()->role == 'admin'){
            if(!in_array($request->role,['admin','head','teknisi'])){
                dd('h');
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'head'){
            if(!in_array($request->role,['ketua','head'])){
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'ketua'){
            if(!in_array($request->role,['ketua','checker'])){
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'checker'){
            if($request->role != 'checker'){
                return redirect()->back();
            } 
        }elseif(auth()->user()->role == 'teknisi'){
            if($request->role != 'teknisi'){
                return redirect()->back();
            } 
        }else{
            return redirect()->back();
        }
        UserService::edit($request,$id);
        return redirect()->back();
    }
}
