<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Barang::has('masuk')->with(['masuk' => function($x){
                $x->where('gudang_id',auth('sanctum')->user()->gudang_id);
            }])->get()
        ],200);
    }
}
