<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\Log;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        $data = Barcode::with(['checks.user','mutasi' => function($z){
            $z->with(['user','gudang']);
        },'masuk' => function($q){
            $q->with(['barang','gudang','suplier','user']);
        }])->orderByDesc('updated_at')->get();
        $data['aktivasi'] = Log::where([['type_id',$data->id],['message','LIKE','%aktifasi barcode%']])->first();
        return response()->json([
            'status' => 'ok',
            'data' => $data,
        ],200);
    }
}
