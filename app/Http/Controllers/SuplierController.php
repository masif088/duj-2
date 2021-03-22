<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suplier\StoreRequest;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Services\Suplier\SuplierService;

class SuplierController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    
    }
    public function index(Request $request)
    {
        if($request->suplier != null){
            $suplier = Suplier::where('id',$request->suplier)->orderByDesc('created_at')->paginate(30);
        }else{
            $suplier = Suplier::orderByDesc('created_at')->paginate(30);
        }
        return view('suplier.index',compact('suplier'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $ss = SuplierService::store($request);
        $this->log->create('membuat nama suplier baru #'.$ss->name,'suplier',$ss->id);
        toastr()->success('berhasil membuat');

        return redirect()->back();
    }
    public function update(StoreRequest $request,Suplier $id)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        SuplierService::update($request,$id);
        $this->log->create('update nama suplier','suplier',$id->id);
        toastr()->success('berhasil membuat');

        return redirect()->back();
    }
    public function delete(Suplier $id)
    {
        $this->log->create('delete nama suplier #'.$id->name,'suplier',$id->id);
        $id->delete();
        toastr()->success('berhasil membuat');

        return redirect()->back();
    }
}
