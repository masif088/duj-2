<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Infra;
use App\Models\ServiceInfra;
use Illuminate\Http\Request;
use Services\Infra\InfraService;

class InfraController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Infra::where('gudang_id',auth('sanctum')->user()->gudang_id)->with(['serviceInfra','gudang'])->get()
        ],200);
    }
    public function scan(Request $request)
    {
        $i = Infra::where('kode',$request->kode)->with(['serviceInfra','gudang'])->latest()->first();
        return response()->json([
            'status' => 'ok',
            'data' => $i
        ],200);
    }
    public function detail(Request $request)
    {
        $i = Infra::where('kode',$request->kode)->with(['serviceInfra','gudang','inframutasis.gudang'])->latest()->first();
        if($i == null || $i->inframutasis->gudang_id != auth('sanctum')->user()->gudang_id || $i->status != 'mutasi'){
            return response()->json([
                'status' => 'error',
                'msg' => 'barang tidak valid'
            ],400);
        }
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
        $ss = ServiceInfra::create([
            'file' => $fileName,
            'deskripsi' => $request->deskripsi,
            'infra_id' => $id->id
        ]);
        $this->log->create('membuat service infrastruktur #'.$request->kode,'service_infra',$ss->id);
        
        return response()->json([
            'status' => 'ok',
        ],201);
    }
    public function terjual(Request $request)
    {
        $b = Infra::where([['kode',$request->kode],['status','ready'],['gudang_id',auth('sanctum')->user()->gudang_id]])->latest()->first();
        if($b == null){
                return response()->json([
                    'status' =>'error',
                    'msg' => 'Kode tidak ditemukan/barang tidak ready'
                ],400);
            }
            InfraService::status($b,'terjual');
            return response()->json([
                'status' =>'ok',
            ],201);
    }
}
