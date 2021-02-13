<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Gudang;
use App\Models\User;
use Illuminate\Http\Request;
use Services\User\UserService;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $gudang = Gudang::get();
        return view('user.profil',compact(['user','gudang']));
    }
    public function all()
    {
        $user = User::where('role' ,'!=','admin')->get();
        return view('user.list',compact('user'));
    }
    public function create()
    {
        $gudang = Gudang::get();
        return view('user.create',compact('gudang'));
    }
    public function edit(User $id)
    {
        $user = $id;
        if(auth()->user()->role != 'admin'){
            $user = auth()->user();
        }
        $gudang = Gudang::get();
        return view('user.profil',compact(['user','gudang']));
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
            return redirect()->back()->withErrors($request->validator->messages());
        }
        if(auth()->user()->role != 'admin'){
                return redirect()->back();
          
        }
        UserService::edit($request,$id);
        return redirect()->back();
    }
}
