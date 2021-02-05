<?php

namespace App\Http\Controllers;

use App\Http\Requests\Barang\StoreRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Services\Barang\BarangService;

class BarangController extends Controller
{
    public function create()
    {
        $barang = Barang::get();
        return view('backend.barang',compact('barang'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        BarangService::store($request);
        return redirect()->back();
    }
}
