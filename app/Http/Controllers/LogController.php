<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function create($ak,$ac)
    {
        $l = Log::create([
            'user_id' => auth()->user()->id,
            'aktivitas' => $ak,
            'action' => $ac
        ]);
        return $l;
    }
}
