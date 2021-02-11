<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mutasi\StoreRequest;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Services\Barcode\BarcodeService;
use Services\Mutasi\MutasiService;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasis = Barcode::where('status', 'mutasi')->whereHas('masuk', function ($s) {
            return $s->where('gudang_id', auth()->user()->gudang_id);
        })->whereHas('mutasi', function ($m) {
            return $m->where('status', '!=', 'batal');
        })->with(['mutasi', 'masuk'])->get();
        return view('backend.listkeluar', compact('mutasis'));
    }
    public function create()
    {
        $gudang = Gudang::get();
        return view('backend.mutasi', compact('gudang'));
    }
    public function store(StoreRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = BarcodeService::find($request->kode);
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif' || $data->status == 'mutasi') return 'barang masih nonaktif/telahh termutasi';
        DB::transaction(function() use($data,$request){
            BarcodeService::update($data, 'mutasi');
            MutasiService::store($request, $data->id);
            
        });
        return redirect()->back();
    }
    public function edit(Mutasi $id)
    {
        $gudang = Gudang::get();
        return view('backend.editmutasi', compact(['gudang', 'id']));
    }
    public function update(StoreRequest $request, Mutasi $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = BarcodeService::find($request->kode);
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif') return 'barang masih nonaktif';
        if ($data->status == 'mutasi' && $data->kode != $id->barcode->kode) return 'barang telah termutasi';
        DB::transaction(function() use($data,$id,$request){
            if ($data->kode != $id->barcode->kode) {
                BarcodeService::update($id->barcode(), 'aktif');
            }
            MutasiService::update($id, $data->id, $request->gudang);
            BarcodeService::update($data, 'mutasi');
        });
        return redirect()->back();
    }
    public function batal(Mutasi $id)
    {
        DB::transaction(function() use($id){
            MutasiService::batal($id);
            BarcodeService::update($id->barcode(), 'aktif');
        });
        return redirect()->back();
    }
}
