<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mutasi\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Services\Barcode\BarcodeService;
use Services\Mutasi\MutasiService;

class MutasiController extends Controller
{
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
}
