<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mutasi\StoreRequest;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Services\Barcode\BarcodeService;
use Services\Mutasi\MutasiService;

class MutasiController extends Controller
{
    public function riwayat()
    {
        $mutasi = Mutasi::whereHas('barcode', function ($m) {
            return $m->whereHas('masuk', function($z){
                return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
            });
        })->get();
        return response()->json([
            'status' => 'ok',
            'data' => $mutasi
        ],201);
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return response()->json([
                'status' => 'error',
                'data' => $request->validator->messages(),
            ],400);
        }
        $data = BarcodeService::find($request->kode,'aktif');
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif' || $data->status == 'mutasi') return 'barang masih nonaktif/telahh termutasi';
        DB::transaction(function() use($data,$request){
            BarcodeService::update($data, 'mutasi');
            MutasiService::store($request, $data->id);
            
        });
        return response()->json([
            'status' => 'ok',
        ],201);
    }
    public function batal(Mutasi $id)
    {
        DB::transaction(function() use($id){
            MutasiService::batal($id);
            BarcodeService::update($id->barcode(), 'aktif');
        });
        return response()->json([
            'status' => 'ok'
        ],200);
    }
}
