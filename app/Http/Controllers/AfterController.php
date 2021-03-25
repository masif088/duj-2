<?php

namespace App\Http\Controllers;

use App\Http\Requests\After\StoreRequest;
use App\Models\After;
use App\Models\ServiceAfter;
use Illuminate\Http\Request;
use Services\Barcode\BarcodeService;

class AfterController extends Controller
{
    public function __construct()
    {
        $this->fcm = new FcmController;
        $this->log = new LogController;
    }
    public function index(Request $request)
    {
        if($request->after != null){
            $after = After::where('id',$request->after)->orderByDesc('created_at')->paginate(10);
        }elseif($request->safter != null){
            $after = ServiceAfter::where('id',$request->safter)->first()->after()->paginate(10);
        }else{
            $after = After::orderByDesc('created_at')->paginate(10);

        }
        return view('service.after.index',compact('after'));
    }
    public function create()
    {
        return view('backend.after.create');
    }
    public function store(StoreRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = BarcodeService::find($request->kode,'terjual');
        if($data == null){
            toastr()->warning('maaf kode yang anda masukan salah');
        }
        if(After::where('barcode_id',$data->id)->whereHas('serviceAfters',function($x){
            return $x->where('status','pengajuan')->orWhere('status','tidak');
        })->exists()){
            toastr()->warning('maaf barang anda sedang dalam proses pengajuan atau perbaikan');
            return redirect()->back();
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
        
            if(After::where('barcode_id',$data->id)->exists()){
                $after = After::where('barcode_id',$data->id)->first();
                ServiceAfter::create([
                    'after_id' => $after->id,
                    'deskripsi' => $request->deskripsi,
                    'file' => $fileName
                ]);
                    $after->update([
                    'user_id' => auth()->user()->id,
                    ]);
            }else{
                $after = After::create([
                    'user_id' => auth()->user()->id,
                    'barcode_id' => $data->id,
                    'gudang_id' => auth()->user()->gudang_id,
                    'nama_pembeli' => $request->nama_pembeli,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp
                    ]);
                    ServiceAfter::create([
                        'after_id' => $after->id,
                        'deskripsi' => $request->deskripsi,
                        'file' => $fileName
                        ]);
                    }
                    $this->log->create('menambah after sale','after',$after->id);
        toastr()->success('Berhasil');

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
            'gudang_id' => auth()->user()->gudang_id,
            'barcode_id' => $data->id,
            'nama_pembeli' => $request->nama_pembeli
        ]);
        toastr()->success('Berhasil');

        $this->log->create('mengubah after sale','after',$id->id);

        return redirect()->back();
    }
    public function setuju(After $id)
    {
        $id->serviceAfter()->update([
            'status' => 'tidak',
        ]);
        toastr()->success('Berhasil');

        $this->log->create('Persetujuan after sale','after',$id->id);
        $this->fcm->send(' AfterSale','Selamat persetujuan telah diterima',null,null,null,$id->gudang_id);
        return redirect()->back();
    }
    public function tolak(Request $request,After $id)
    {
        $id->serviceAfter()->update([
            'status' => 'tolak',
            'alasan' => $request->alasan
        ]);
        toastr()->success('Berhasil');

        $this->fcm->send('Persetujuan AfterSale','Persetujuan anda ditolak',null,null,null,$id->gudang_id);
        $this->log->create('Persetujuan after sale ditolak','after',$id->id);
        return redirect()->back();
    }
}
