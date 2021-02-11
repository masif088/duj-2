<?php

namespace App\Http\Controllers;

use App\Models\Infra;
use App\Models\ServiceInfra;
use Illuminate\Http\Request;

class ServiceInfraController extends Controller
{
    public function index()
    {
        $service  = ServiceInfra::get();
        return view('backend.serviceInfra',compact('service'));
    }
    public function store(Infra $id)
    {
        $id->update([
            'status' => 'rusak',
            ]);
        ServiceInfra::create([
            'infra_id' => $id->id
        ]);
        return redirect()->back();
    }
    function edit(ServiceInfra $id)
    {
        return view('backend.serviceInfraEdit',compact('id'));
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
        return redirect()->back();
    }
}
