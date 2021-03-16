<?php

namespace App\Http\Controllers;

use App\Http\Requests\Barang\StoreRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Services\Barang\BarangService;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function detail(Barang $id)
    {
        if(auth()->user()->role != 'admin'){
            $barcode = $id->barcodes()->whereHas('masuk',function($m){
               return $m->where('gudang_id',auth()->user()->gudang_id); 
            })->get();
        }else{
            $barcode = $id->barcodes()->with('masuk')->get();
        }
        return view('backend.barcode',compact('barcode'));
    }
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $barang = Barang::orderByDesc('created_at')->paginate(30);
        }else{
            $barang = Barang::whereHas('masuk',function($z){
                return $z->where('gudang_id',auth()->user()->gudang_id);
            })->orderByDesc('created_at')->paginate(30);
        }
        return view('barang.semuabarang',compact('barang'));
    }
    public function create()
    {
        $barang = Barang::orderByDesc('created_at')->paginate(30);
        return view('barang.index',compact('barang'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        BarangService::store($request);
        $this->log->create('Nama Barang','c');
        toastr()->success('Berhasil');

        return redirect()->back();
    }
    public function update(StoreRequest $request,Barang $id)
    {
        BarangService::update($request,$id);
        $this->log->create('Nama Barang','u');
        toastr()->success('Berhasil');

        return redirect()->back();
    }
    public function delete(Barang $id)
    {
        try {
            $id->delete();
        $this->log->create('Nama Barang','d');
        toastr()->success('Berhasil');

        } catch (\Throwable $th) {
            toastr()->warning('Nama Barang telah digunakan');
        }
        return redirect()->back();
    }
}
