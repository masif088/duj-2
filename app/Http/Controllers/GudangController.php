<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gudang\StoreRequest;
use Illuminate\Http\Request;
use Services\Gudang\GudangService;


class GudangController extends Controller
{
    public function create()
    {
        return view('backend.gudang');
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        GudangService::store($request);
        return redirect()->back();
    }
}
