<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suplier\StoreRequest;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Services\Suplier\SuplierService;

class SuplierController extends Controller
{
    public function index()
    {
        $suplier = Suplier::get();
        return view('suplier.index',compact('suplier'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        SuplierService::store($request);
        return redirect()->back();
    }
    public function update(StoreRequest $request,Suplier $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        SuplierService::update($request,$id);
        return redirect()->back();
    }
    public function delete(Suplier $id)
    {
        $id->delete();
        return redirect()->back();
    }
}
