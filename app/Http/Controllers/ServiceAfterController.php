<?php

namespace App\Http\Controllers;

use App\Models\ServiceAfter;
use Illuminate\Http\Request;

class ServiceAfterController extends Controller
{
    public function edit(ServiceAfter $id)
    {
        return view('backend.after.edit',compact('id'));
    }
    public function update(Request $request,ServiceAfter $id)
    {
        $id->update([
            'user_id' => auth()->user()->id,
            'sparepart' =>$request->sparepart,
            'lama' => $request->lama,
            'status' => $request->status ?? 'tidak',
        ]);
        return redirect()->back();
    }
    public function batal(ServiceAfter $id)
    {
        $id->update([
            'status' => 'batal'
        ]);
        return redirect()->back();
    }
}
