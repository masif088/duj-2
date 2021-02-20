<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Infra;
use App\Models\ServiceInfra;
use Illuminate\Http\Request;

class InfraController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Infra::where('gudang_id',auth('sanctum')->user()->gudang_id)->with('serviceInfra')->get()
        ],200);
    }
    public function scan(Request $request)
    {
        $i = Infra::where('kode',$request->kode)->with('serviceInfra')->first();
        return response()->json([
            'status' => 'ok',
            'data' => $i
        ],200);
    }
    public function service(Request $request)
    {
        $id = Infra::where('kode',$request->kode)->where('gudang_id',auth('sanctum')->user()->gudang_id)->first();
        if($id == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'maaf kode yang anda masukan salah'
            ],400);
        }
        if($request->file == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'maaf file yang anda masukan salah'
            ],400);
        }
        if($id == null || $request->file == null){
            return response()->json([
                'status' => 'error',
                'msg' => 'kode dan file tidak ditemukan'
            ],400);
        }
        $fileName = null;
            $file = $request->file('file');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/infra/',$fileName);
        
        $id->update([
            'status' => 'rusak',
            ]);
        ServiceInfra::create([
            'file' => $fileName,
            'deskripsi' => $request->deskripsi,
            'infra_id' => $id->id
        ]);
        return response()->json([
            'status' => 'ok',
        ],201);
    }
}
