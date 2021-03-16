<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gudang\StoreRequest;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Services\Gudang\GudangService;


class GudangController extends Controller
{
    public function index()
    {
        $gudang = Gudang::orderByDesc('created_at')->paginate(30);
        return view('gudang.index',compact('gudang'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        GudangService::store($request);
        return redirect()->back();
    }
    public function update(StoreRequest $request,Gudang $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        GudangService::update($request,$id);
        return redirect()->back();
    }
    public function delete(Gudang $id)
    {
        $id->delete();
        return redirect()->back();
    }
}
