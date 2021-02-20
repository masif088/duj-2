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
        $data = BarcodeService::find($request->kode,'aktif',auth('sanctum')->user()->gudang_id);
        if ($data->status != 'aktif'){
            toastr()->warning('barang belum aktif');
            return redirect()->back();
        } 
        BarcodeService::update($data,'terjual');
        return redirect()->back();
    }
   
}
