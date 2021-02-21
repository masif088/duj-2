<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Barcode;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Barang::whereHas('masuk',function($zz){
                return $zz->where('gudang_id',auth('sanctum')->user()->gudang_id)->whereHas('barcode',function($xx){
                    return $xx->where('status','aktif');
                });
            })->with(['masuk' => function($x){
                $x->where('gudang_id',auth('sanctum')->user()->gudang_id)->whereHas('barcode',function($xx){
                    return $xx->where('status','aktif');
                })->with(['barcode' => function($cc){
                    $cc->where('status','aktif');
                }]);
            }])->has('masuk')->get()
        ],200);
    }
    public function terjual(Request $request)
    {
        $data = BarcodeService::find($request->kode,null,auth('sanctum')->user()->gudang_id);
        if ($data == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'kode tidak ditemukan'
            ],400);
        } 
        BarcodeService::update($data,'terjual');
        return response()->json([
            'status' => 'ok',
        ],200);
    }
    public function status()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Barcode::whereHas('masuk',function($x){
                return $x->where('gudang_id',auth('sanctum')->user()->gudang_id);
            })->where('status','terjual')->get(),
        ]);
    }
}
