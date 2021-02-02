<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
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
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = UserService::store($request);
        return $data;
    }
}
