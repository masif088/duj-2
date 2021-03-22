<?php

namespace App\Http\Controllers;

use App\Http\Requests\Barang\StoreRequest;
use App\Models\Barang;
use App\Models\Barcode;
use Illuminate\Http\Request;
use Services\Barang\BarangService;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function detail(Request $request,Barang $id)
    {
        if(auth()->user()->role != 'admin'){
            $barcode = $id->barcodes()->whereHas('masuk',function($m){
               return $m->where('gudang_id',auth()->user()->gudang_id); 
            })->get();
        }else{
            if($request->barcode != null){
                $barcode = Barcode::where('id',$request->barcode)->with('masuk')->get();
            }else{
                $barcode = $id->barcodes()->with('masuk')->get();
            }
        }
        return view('backend.barcode',compact('barcode'));
    }
    public function index(Request $request)
    {
        if(auth()->user()->role == 'admin'){
            if($request->barang != null){
                $barang = Barang::where('id',$request->barang)->orderByDesc('created_at')->paginate(30);
            }else{
                $barang = Barang::orderByDesc('created_at')->paginate(30);
            }
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
        $id = BarangService::store($request);
        $this->log->create('menambah nama barang','barang',$id->id);
        toastr()->success('Berhasil');

        return redirect()->back();
    }
    public function update(StoreRequest $request,Barang $id)
    {
        BarangService::update($request,$id);
        toastr()->success('Berhasil');
        $this->log->create('mengubah nama barang','barang',$id->id);

        return redirect()->back();
    }
    public function delete(Barang $id)
    {
        try {
            $name = $id->name;
            $id= $id->id;
            $id->delete();
        $this->log->create('menghapus nama barang #'.$name,'barang',$id);
        toastr()->success('Berhasil');

        } catch (\Throwable $th) {
            toastr()->warning('Nama Barang telah digunakan');
        }
        return redirect()->back();
    }
}
