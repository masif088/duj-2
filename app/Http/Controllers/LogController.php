<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $log = Log::orderByDesc('created_at')->with('user')->paginate(30);
        return view('user.log',compact('log'));
    }
    public function create($mes,$ty,$tyid)
    {
        $l = Log::create([
            'user_id' => auth()->user()->id ?? auth('sanctum')->user()->id,
            'message' => $mes,
            'type' => $ty,
            'type_id' => $tyid
        ]);
        return $l;
    }
}
