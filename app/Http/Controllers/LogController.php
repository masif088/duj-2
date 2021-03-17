<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $log = Log::orderByDesc('created_at')->paginate(30);
        return $log;
    }
    public function create($mes,$ty,$tyid)
    {
        $l = Log::create([
            'user_id' => auth()->user()->id,
            'message' => $mes,
            'type' => $ty,
            'type_id' => $tyid
        ]);
        return $l;
    }
}
