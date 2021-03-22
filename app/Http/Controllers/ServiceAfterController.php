<?php

namespace App\Http\Controllers;

use App\Models\ServiceAfter;
use Illuminate\Http\Request;

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
        $id->update([
            'user_id' => auth()->user()->id,
            'sparepart' =>$request->sparepart,
            'lama' => $request->lama,
            'status' => $request->status ?? 'tidak',
        ]);
        toastr()->success('Berhasil');
        $this->log->create('update data after sale #'.$id->after->nama_pembeli,'service_after',$id->id);
        return redirect()->back();
    }
    public function batal(ServiceAfter $id)
    {
        $id->update([
            'status' => 'batal'
        ]);
        $this->log->create('membatalkan after sale','service_after',$id->id);
        toastr()->success('Berhasil');
        
        return redirect()->back();
    }
}
