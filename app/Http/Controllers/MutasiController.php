<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mutasi\StoreRequest;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;
use Services\Mutasi\MutasiService;

class MutasiController extends Controller
{
    public function create()
    {
        $gudang = Gudang::get();
        return view('backend.mutasi',compact('gudang'));
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = BarcodeService::find($request->kode);
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif' || $data->status == 'mutasi') return 'barang masih nonaktif/telahh termutasi';
        BarcodeService::update($data,'mutasi');
        MutasiService::store($request,$data->id);
        return redirect()->back();
    }
}
