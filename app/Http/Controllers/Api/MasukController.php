<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Masuk;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;
use Services\Masuk\MasukService;

class MasukController extends Controller
{
    public function riwayat()
    {
        $masuk = Masuk::where('gudang_id',auth('sanctum')->user()->gudang_id)->with('barcode')->get();
        return response()->json([
            'status' => 'ok',
            'data' => $masuk,
        ],200); 
    }
    public function store(Request $request)
    {
        $b = BarcodeService::find($request->kode,'mutasi');
        if($b == null || (auth('sanctum')->user()->gudang_id != $b->mutasi->gudang_id) || $b->mutasi->status != 'proses'){
            return response()->json([
                'status' => 'error',
                'msg' => 'tidak ditemukan'
            ],400);
        }
        MasukService::storeMutasi($b);
        return response()->json([
            'status' => 'ok'
        ],201);
    }
}
