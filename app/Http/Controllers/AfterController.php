<?php

namespace App\Http\Controllers;

use App\Models\After;
use App\Models\ServiceAfter;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;

class AfterController extends Controller
{
    public function index()
    {
        $after = After::get();
        return view('service.after.index',compact('after'));
    }
    public function create()
    {
        return view('backend.after.create');
    }
    public function store(Request $request)
    {
        $data = BarcodeService::find($request->kode,'terjual');
        if($data == null){
            toastr()->warning('maaf kode yang anda masukan salah');
        }
        if($request->file == null){
            toastr()->warning('maaf file yang anda masukan salah');
        }
        if($data == null || $request->file == null){
            return redirect()->back();
        }
        $fileName = null;
            $file = $request->file('file');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/after/',$fileName);
        
        $after = After::create([
            'user_id' => auth()->user()->id,
            'barcode_id' => $data->id,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        ServiceAfter::create([
            'after_id' => $after->id,
            'file' => $fileName
        ]);
        return redirect()->back();
    }
    public function edit(After $id)
    {
        return view('backend.after.editafter',compact('id'));
    }
    public function update(Request $request,After $id)
    {
        $data = BarcodeService::find($request->kode);
        if ($data == null) return 'tidak ditemukan';
        if ($data->status == 'nonaktif') return 'barang masih nonaktif';
        $id->update([
            'user_id' => auth()->user()->id,
            'barcode_id' => $data->id,
            'nama_pembeli' => $request->nama_pembeli
        ]);
        return redirect()->back();
    }
    public function setuju(After $id)
    {

        $id->serviceAfter()->update([
            'status' => 'tidak',
        ]);
        return redirect()->back();
    }
}
