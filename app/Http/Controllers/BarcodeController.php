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
        $data = BarcodeService::find($request->kode);
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'aktif') return 'barang telah aktif';
        BarcodeService::update($data,'aktif');
        return redirect()->back();
    }
    public function jual()
    {
        return view('barcode.terjual');
    }
    public function terjual(Request $request)
    {
        $data = BarcodeService::find($request->kode,'aktif');
        if ($data->status != 'aktif'){
            toastr()->warning('barang belum aktif');
            return redirect()->back();
        } 
        BarcodeService::update($data,'terjual');
        return redirect()->back();
    }
}
