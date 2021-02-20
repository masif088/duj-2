<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\After;
use App\Models\ServiceAfter;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;

class AfterController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => After::where('gudang_id',auth('sanctum')->user()->gudang_id)->with(['serviceAfter','barcode.masuk.barang'])->get(),
             
        ],200);
    }
    public function store(Request $request)
    {
        $data = BarcodeService::find($request->kode,'terjual');
        if($data == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'kode tidak ditemukan'
            ],400);
        }
        if($request->file == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'file yang anda masukan salah'
            ],400);
        }
        if($data == null || $request->file == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'file dan kode mohon diisi'
            ],400);
        }
        $fileName = null;
            $file = $request->file('file');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/after/',$fileName);
        
        $after = After::create([
            'user_id' => auth('sanctum')->user()->id,
            'barcode_id' => $data->id,
            'gudang_id' => auth('sanctum')->user()->gudang_id,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        ServiceAfter::create([
            'after_id' => $after->id,
            'deskripsi' => $request->deskripsi,
            'file' => $fileName
        ]);
        return response()->json([
            'status' => 'sukses',
            'msg' => 'sukses membuat pengajuan'
        ],200);
    }
}
