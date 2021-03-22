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
        $this->log = new LogController;
    
    }
    public function index(Request $request)
    {
        if($request->infra != null){
            $service = ServiceInfra::where('id',$request->infra)->orderByDesc('created_at')->paginate(10);
        }else{
            $service = ServiceInfra::orderByDesc('created_at')->paginate(10);

        }
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
        $ss = ServiceInfra::create([
            'file' => $fileName,
            'deskripsi' => $request->deskripsi,
            'infra_id' => $id->id
        ]);
        $this->log->create('membuat service infrastruktur #'.$request->kode,'service_infra',$ss->id);

        toastr()->success('Berhasil');
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
            $this->log->create('menyelesaikan service infrastruktur #'.$id->infra->kode,'service_infra',$id->id);
        }else{
            $this->log->create('perubahan service infrastruktur #'.$id->infra->kode,'service_infra',$id->id);

        }
        return redirect()->back();
    }
    public function setuju(ServiceInfra $id)
    {

        $id->update([
            'status' => 'tidak',
        ]);
        $this->fcm->send('Persetujuan Infratruktur','Selamat persetujuan telah diterima',null,null,null,$id->infra->gudang_id);
        $this->log->create('persetujuan service infrastruktur #'.$id->infra->kode,'service_infra',$id->id);
        return redirect()->back();
    }
    public function tolak(Request $request,ServiceInfra $id)
    {

        $id->update([
            'status' => 'tolak',
            'alasan' => $request->alasan
        ]);
        $this->log->create('Penolakan pengajuan service infrastruktur #'.$id->infra->kode,'service_infra',$id->id);

        $this->fcm->send('Persetujuan Infratruktur','Selamat persetujuan telah diterima',null,null,null,$id->infra->gudang_id);
        return redirect()->back();
    }
    public function batal(ServiceInfra $id)
    {
        $id->infra()->update([
            'status' => 'ready'
        ]);
        $this->log->create('Pembatalan pengajuan service infrastruktur #'.$id->infra->kode,'infra',$id->infra->id);
        $id->delete();
        return redirect()->back();
    }
}
