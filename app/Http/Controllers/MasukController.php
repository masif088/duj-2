<?php

namespace App\Http\Controllers;

use App\Http\Requests\Masuk\StoreRequest;
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
        return view('frontend.barang.barang_masuk',MasukService::create());
    }
    public function index()
    {
        return view('backend.listbarang',MasukService::index());
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        MasukService::store($request);
        return redirect()->back();
    }
    public function edit(Masuk $id)
    {
        $barang = Barang::get();
        $gudang = Gudang::get();
        $suplier = Suplier::get();
        return view('backend.editmasuk',compact(['barang','gudang','suplier','id']));
    }
    public function update(StoreRequest $request,Masuk $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        MasukService::update($request,$id);
        return redirect()->back();
    }
}
