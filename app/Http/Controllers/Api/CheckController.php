<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Barcode;
use App\Models\Check;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function riwayat()
    {

        $b = Barcode::where('status','aktif')->whereHas('masuk',function($z){
            return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
        })->get();
        $c = Check::whereIn('barcode_id',$b->pluck('id'))->get();
        return response()->json([
            'status' => 'ok',
            'data' => [
                'barcode' => $b,
                'check' =>$c
                ]
        ]);
    }
    public function store(Request $request)
    {
        $b = Barcode::where('kode',$request->kode)->where('status','aktif')->whereHas('masuk',function($z){
            return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
        })->first();
        
        if($b == null ){
            return response()->json([
                'status' => 'error',
                'msg' => 'kode tidak ditemukan/barang telah dicheck'
            ],400);
        }
        if(Carbon::parse($b->check->created_at)->format('Y-m-d') < Carbon::now()->format('Y-m-d')){
            Check::create([
                'user_id' => auth('sanctum')->user()->id,
                'barcode_id' => $b->id
            ]);

        }
        return response()->json([
            'status' => 'ok',
            'data' => $b
        ],201);
    }
}
