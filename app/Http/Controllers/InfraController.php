<?php

namespace App\Http\Controllers;

use App\Http\Requests\Infra\StoreRequest;
use App\Models\Gudang;
use App\Models\Infra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        if ($request->infra != null) {
            $infra = Infra::where('status', '!=', 'mutasi')->where('status', '!=', 'terjual')->where('id', $request->infra)->orderByDesc('created_at')->paginate(30);
        } else {
            $infra = Infra::where('status', '!=', 'mutasi')->where('status', '!=', 'terjual')->orderByDesc('created_at')->paginate(30);

        }
        return view('infra.infra', compact('infra'));
    }

    public function riwayat(Request $request)
    {
        if ($request->infra != null) {
            $infra = Infra::where('status', 'terjual')->where('id', $request->infra)->orderByDesc('created_at')->paginate(30);
        } else {
            $infra = Infra::where('status', 'terjual')->orderByDesc('created_at')->paginate(30);

        }
        return view('infra.infra', compact('infra'));
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

        $data = [
            "action" => 'infra.store',
            'user_id' => Auth::id(),
            'gudang_id' => Auth::user()->gudang_id,
            'kode' => Str::random(6),
            'name' => $request->name];
        return view('fingers.index', compact('data'));
    }

    public function barcode(Infra $b)
    {
        set_time_limit(300);

        $b['bb'] = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($b->kode));

        $customPaper = array(0, 0, 283.80, 567.00,'landscape');
        $pdf = PDF::loadView('backend.infraBarcode', compact('b'))->setPaper($customPaper);
        return $pdf->stream();
    }

    public function edit(Infra $id)
    {

        return view('infra.edit', compact('id'));
    }

    public function update(StoreRequest $request, Infra $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->withErrors($request->validator->messages());
        }
        $data = [
            "action" => 'infra.update',
            'user_id' => Auth::id(),
            'name' => $request->name,
            'id' => $id->id
        ];
//        dd($data);
        return view('fingers.index', compact('data'));
    }

    public function aktivasi()
    {

        return view('infra.aktivasi');
    }

    public function aktiv(Request $request)
    {
        $b = Infra::where([['kode', $request->kode], ['status', 'nonaktif']])->first();
        if ($b == null) {
            toastr()->warning('Kode tidak ditemukan/barang telah ready');
            return redirect()->back();
        }
//        InfraService::status($b, 'ready');
//        toastr()->success('berhasil');
//
//        return view('infra.aktivasi');
        $data = [
            "action" => 'infra.aktiv',
            'id'=>$b->id,
            'user_id' => Auth::id(),
        ];
        return view('fingers.index', compact('data'));
    }

    public function jual()
    {
        return view('infra.mutasi.jual');
    }

    public function terjual(Request $request)
    {
        $b = Infra::where([['kode', $request->kode], ['status', 'ready'], ['gudang_id', auth()->user()->gudang_id]])->latest()->first();
        if ($b == null) {
            toastr()->warning('Kode tidak ditemukan/barang tidak ready');
            return redirect()->back();
        }
//        InfraService::status($b, 'terjual');
//        toastr()->success('berhasil');
//        return redirect()->back();
        $data = [
            "action" => 'infra.terjual',
            'id'=>$b->id,
            'user_id' => Auth::id(),
        ];
        return view('fingers.index', compact('data'));
    }
}
