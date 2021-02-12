<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Check;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function riwayat()
    {
        $b = Barcode::whereHas('masuk',function($x){
            return $x->where('gudang_id',auth('sanctum')->user()->gudang_id);
        })->with(['check','masuk' => function($z){
            $z->with('barang');
        }])->get();
        return response()->json([
            'status' => 'ok',
            'data' => $b
        ]);
    }
    public function store(Request $request)
    {
        $b = Barcode::where('kode',$request->kode)->whereHas('masuk',function($z){
            return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
        })->with(['masuk' => function($x){
            $x->with('barang');
        }])->first();
        if($b == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'kode tidak ditemukan'
            ],400);
        }
        Check::create([
            'user_id' => auth('sanctum')->user()->id,
            'barcode_id' => $b->id
        ]);
        return response()->json([
            'status' => 'ok',
            'data' => $b
        ],201);
    }
}
