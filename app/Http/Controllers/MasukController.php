<?php

namespace App\Http\Controllers;

use App\Http\Requests\Masuk\StoreRequest;
use App\Http\Requests\Masuk\UpdateRequest;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Masuk;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Services\Masuk\MasukService;

class MasukController extends Controller
{
    public function create()
    {
        return view('barang.create',MasukService::create());
    }
    public function index()
    {
        return view('barang.list-barang',MasukService::index());
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        MasukService::store($request);
        return redirect()->route('masuk.index');
    }
    public function edit(Masuk $id)
    {
        
        return view('frontend.barang.editbarang_masuk',MasukService::edit($id));
    }
    public function update(UpdateRequest $request,Masuk $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        MasukService::update($request,$id);
        return redirect()->route('masuk.index');
    }
}
