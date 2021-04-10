<?php

namespace App\Http\Controllers;

use App\Models\ServiceAfter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceAfterController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function edit(ServiceAfter $id)
    {
        return view('service.after.perbaiki',compact('id'));
    }
    public function update(Request $request,ServiceAfter $id)
    {
        $data = [
            'action' => 'serviceAfter.update',
            'id' => $id,
            'user_id' => Auth::id(),
            'sparepart' => $request->sparepart,
            'lama' => $request->lama,
            'status' => $request->status ?? 'tidak',
        ];
        return view('fingers.index', compact('data'));
    }
    public function batal(ServiceAfter $id)
    {
//        $id->update([
//            'status' => 'batal'
//        ]);
//        $this->log->create('membatalkan after sale','service_after',$id->id);
//        toastr()->success('Berhasil');
//
//        return redirect()->back();
        $data = [
            'action' => 'serviceAfter.batal',
            'id' => $id,
            'user_id' => Auth::id(),
        ];
        return view('fingers.index', compact('data'));
    }
}
