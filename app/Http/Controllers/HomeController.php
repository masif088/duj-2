<?php

namespace App\Http\Controllers;

use App\Models\After;
use App\Models\Barcode;
use App\Models\Infra;
use App\Models\Masuk;
use App\Models\Mutasi;
use App\Models\ServiceAfter;
use App\Models\ServiceInfra;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $barangMasuk = Masuk::count();
            $barangKeluar = Barcode::where('status','terjual')->count();
            $stok = Barcode::where('status','aktif')->count();
            $service = After::whereHas('serviceAfter',function($z){
                return $z->where('status','pengajuan');
            })->whereDate('created_at',date('Y-m-d'))->orderByDesc('created_at')->get();
            $infra = ServiceInfra::where('status','pengajuan')->whereDate('created_at',date('Y-m-d'))->orderByDesc('created_at')->get();
            return view('dashboard.Admin',compact(['infra','service','stok','barangMasuk','barangKeluar']));
        }
        if(auth()->user()->role == 'head'){
            $masuk =Masuk::whereDate('created_at',date('Y-m-d'))->orderByDesc('created_at')->get();
            $admin = User::where('role','admin')->count();
            return view('dashboard.HO',compact(['masuk','admin']));
        }
        if(auth()->user()->role == 'teknisi'){
            $infra = Infra::where('status','rusak')->count();
            $after = ServiceAfter::take(10)->latest()->get();
            $infraP = ServiceInfra::take(10)->latest()->get();
            return view('dashboard.Teknisi',compact(['after','infra','infraP']));
        }
    }
}
