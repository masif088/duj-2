<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index($id)
    {
        $barcode = Barcode::where('masuk_id',$id)->get();
        return view('backend.barcode',compact('barcode'));
    }
}
