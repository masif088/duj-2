<?php

namespace App\Http\Controllers;

use App\Http\Requests\Infra\StoreRequest;
use App\Models\Infra;
use Illuminate\Http\Request;
use Services\Infra\InfraService;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade as PDF;

class InfraController extends Controller
{
    public function __construct()
    {
        $this->log = new LogController;
    }
    public function index(Request $request)
    {
        if($request->infra != null){
            $infra = Infra::where('id',$request->infra)->orderByDesc('created_at')->paginate(30);
        }else{
            $infra = Infra::orderByDesc('created_at')->paginate(30);

        }
        return view('infra.infra',compact('infra'));
    }
    public function create()
    {
        return view('infra.create');
    }
    public function store(StoreRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data=InfraService::store($request);
        $this->log->create('menambah infrastruktur #'.$data->name,'infra',$data->id);
        toastr()->success('Berhasil');

        return redirect()->route('infra.index');
    }
    public function barcode(Infra $b)
    {
        set_time_limit(300);
    
        $b['bb'] = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($b->kode));
        
        $customPaper = array(0,0,567.00,283.80);
    $pdf = PDF::loadView('backend.infraBarcode',compact('b'))->setPaper($customPaper);
    return $pdf->stream();
    }
    public function edit(Infra $id)
    {
       
        return view('infra.edit',compact('id'));
    }
    public function update(StoreRequest $request,Infra $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        InfraService::update($request,$id);
        $this->log->create('mengubah infrastruktur #'.$id->name,'infra',$id->id);
        toastr()->success('Berhasil');

        return redirect()->route('infra.index');
    }
}
