<?php

namespace App\Http\Controllers;

use App\Http\Requests\Infra\StoreRequest;
use App\Http\Requests\InfraRequest;
use App\Models\Infra;
use Illuminate\Http\Request;
use Services\Infra\InfraService;

class InfraController extends Controller
{
    public function index()
    {
        $infra = Infra::get();
        return view('backend.infra',compact('infra'));
    }
    public function create()
    {
        return view('backend.infraCreate');
    }
    public function store(StoreRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        InfraService::store($request);
        return redirect()->back();
    }
    public function barcode(Infra $b)
    {
        return view('backend.infraBarcode',compact('b'));
    }
    public function edit(Infra $id)
    {
        return view('backend.infraEdit',compact('id'));
    }
    public function update(StoreRequest $request,Infra $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        InfraService::update($request,$id);
        return redirect()->back();
    }
}
