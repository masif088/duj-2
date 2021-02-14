<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;

class BarcodeController extends Controller
{
    public function index($id)
    {
        $barcode = Barcode::where('masuk_id',$id)->get();
        return view('backend.barcode',compact('barcode'));
    }
    public function edit()
    {
        return view('barcode.barcode');
    }
    public function update(Request $request)
    {
        $data = BarcodeService::find($request->kode,'aktif',auth()->user()->gudang_id);
        if ($data == null) {
            toastr()->warning('barang telah aktif/termutasi');
            return redirect()->back();
        }
        if ($data->status == 'aktif' || $data->status == 'mutasi'){
            toastr()->warning('barang telah aktif/termutasi');
            return redirect()->back();
        } 
        BarcodeService::update($data,'aktif');
        return redirect()->back();
    }
    public function jual()
    {
        return view('barcode.terjual');
    }
    public function terjual(Request $request)
    {
        $data = BarcodeService::find($request->kode,'aktif',auth()->user()->gudang_id);
        if ($data->status != 'aktif'){
            toastr()->warning('barang belum aktif');
            return redirect()->back();
        } 
        BarcodeService::update($data,'terjual');
        return redirect()->back();
    }
}
