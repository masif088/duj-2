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

        $data = Check::whereDate('created_at',Carbon::now())->where('gudang_id', auth('sanctum')->user()->gudang_id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $data,
            ]);
    }
    public function start()
    {
        $b = Check::latest()->first();
        if($b == null || Carbon::parse($b->created_at)->format('Y-m-d') < Carbon::now()->format('Y-m-d')){
            $bar = Barcode::where('status','aktif')->whereHas('masuk',function($z){
                return $z->where('gudang_id',auth('sanctum')->user()->gudang_id);
            })->get();
            foreach ($bar as $bb) {
                $bb->check()->create([
                        'user_id' => auth('sanctum')->user()->id,
                        'status' => 't',
                        'gudang_id' => auth('sanctum')->user()->gudang_id,
                    ]);
            }
        }
            $data = Check::whereDate('created_at',Carbon::now())->where('gudang_id', auth('sanctum')->user()->gudang_id)->get();
        
        return response()->json([
            'status' => 'ok',
            'data' =>$data
        ],200);
    }
    public function detail(Request $request)
    {
        $b = Barcode::where('kode',$request->kode)->where('status','aktif')->with(['masuk' => function($xx){
            $xx->with(['barang','gudang','suplier']);
        }])->latest()->first();
        if($b == null || $b->masuk->gudang_id != auth('sanctum')->user()->gudang_id){
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
    public function store($id)
    {
        $c = Check::where([['gudang_id',auth('sanctum')->user()->gudang_id],['barcode_id',$id]])->first();
        if($c == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'barcode tidak ditemukan'
            ],400);
            }       
            $c->update([
                'status' => 'c'
            ]);
        return response()->json([
            'status' => 'ok',
        ],201);
    }
}
