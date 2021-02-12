<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Infra;
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
}
