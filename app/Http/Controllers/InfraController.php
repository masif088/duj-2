<?php

namespace App\Http\Controllers;

use App\Http\Requests\Infra\StoreRequest;
use App\Models\Infra;
use Services\Infra\InfraService;

class InfraController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function index()
    {
          $infra = Infra::orderByDesc('created_at')->paginate(30);
        return view('infra.infra',compact('infra'));
    }
    public function create()
    {
        return view('infra.create');
    }
    public function store(StoreRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data=InfraService::store($request);
        $this->log->create('menambah infrastruktur #'.$data->name,'infra',$data->id);
        toastr()->success('Berhasil');

        return redirect()->route('infra.index');
    }
    public function barcode(Infra $b)
    {
        return view('backend.infraBarcode',compact('b'));
    }
    public function edit(Infra $id)
    {
        return view('infra.edit',compact('id'));
    }
    public function update(StoreRequest $request,Infra $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        InfraService::update($request,$id);
        $this->log->create('mengubah infrastruktur #'.$id->name,'infra',$id->id);
        toastr()->success('Berhasil');

        return redirect()->route('infra.index');
    }
}
