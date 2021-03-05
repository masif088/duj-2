<?php

namespace App\Http\Controllers;

use App\Models\Infra;
use App\Models\ServiceInfra;
use Illuminate\Http\Request;

class ServiceInfraController extends Controller
{
    public function __construct()
    {
        $this->fcm = new FcmController;
    
    }
    public function index()
    {
            $service = ServiceInfra::orderBy('created_at','DESC')->get();
        return view('service.infra.index',compact('service'));
    }
    public function store(Request $request)
    {
        $id = Infra::where('kode',$request->kode)->first();
        if($id == null){
            toastr()->warning('maaf kode yang anda masukan salah');
        }
        if($request->file == null){
            toastr()->warning('maaf file yang anda masukan salah');
        }
        if($id == null || $request->file == null){
            return redirect()->back();
        }
        $fileName = null;
            $file = $request->file('file');
            $fileName = substr(md5(microtime()), 0, 100).'.'.$file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/infra/',$fileName);
        
        $id->update([
            'status' => 'rusak',
            ]);
        ServiceInfra::create([
            'file' => $fileName,
            'deskripsi' => $request->deskripsi,
            'infra_id' => $id->id
        ]);
        return redirect()->back();
    }
    function edit(ServiceInfra $id)
    {
        return view('service.infra.perbaiki',compact('id'));
    }
    public function update(Request $request,ServiceInfra $id)
    {
        $id->update([
            'user_id' => auth()->user()->id,
            'lama' => $request->lama,
            'sparepart' => $request->sparepart,
            'status' => $request->status ?? 'tidak'
        ]);
        if($id->status == 'selesai'){
            $id->infra->update([
                'status' => 'ready'
            ]);
        }
        return redirect()->back();
    }
    public function setuju(ServiceInfra $id)
    {

        $id->update([
            'status' => 'tidak',
        ]);
        $this->fcm->send('Persetujuan Infratruktur','Selamat persetujuan telah diterima',null,null,null,$id->infra->gudang_id);
        return redirect()->back();
    }
    public function batal(ServiceInfra $id)
    {
        $id->infra()->update([
            'status' => 'ready'
        ]);
        $id->delete();
        return redirect()->back();
    }
}
