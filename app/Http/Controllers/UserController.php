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
    public function __construct()
    {
        $this->log = new LogController;
    
    }
    public function index()
    {
        $user = auth()->user();
        $gudang = Gudang::get();
        return view('user.profil',compact(['user','gudang']));
    }
    public function all()
    {
        $user = User::where('id' ,'!=',auth()->user()->id)->get();
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
            toastr()->warning('silahkan cek kembali');
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $ss = UserService::store($request);
        $this->log->create('membuat akun'.$ss->role.' baru #'.$ss->name,'user',$ss->id);

        toastr()->success('berhasil membuat');
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
        $this->log->create('update akun user #'.$id->name,'user',$id->id);
        toastr()->success('berhasil membuat');

        return redirect()->back();
    }
}
