<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Masuk;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;
use Services\Masuk\MasukService;

class MasukController extends Controller
{
    public function riwayat()
    {
       $mutasi = Mutasi::where('gudang_id',auth('sanctum')->user()->gudang_id)->with('barcode.masuk.gudang')->get();
        return response()->json([
            'status' => 'ok',
            'data' => $mutasi,
        ],200); 
    }
    public function store(Request $request)
    {
        $b = BarcodeService::find($request->kode,'mutasi');
        if($b == null || (auth('sanctum')->user()->gudang_id != $b->mutasi->gudang_id) || ($b->mutasi->status != 'proses')){
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
    public function detail(Request $request)
    {
        $b = Barcode::where('kode',$request->kode)->with(['masuk' => function($xx){
            $xx->with(['barang','gudang','suplier']);
        },'mutasi'])->latest()->first();
        if($b == null || $b->masuk->gudang_id == auth('sanctum')->user()->gudang_id){
        return response()->json([
            'status' => 'error',
            'msg' => 'barcode tidak ditemukan'
        ],400);
        }
        return response()->json([
            'status' => 'ok',
            'data' => $b
        ],200);
    }
}
