<?php

namespace Services\Masuk;

use App\Http\Controllers\LogController;
use App\Models\Barang;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Masuk;
use App\Models\Suplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Services\Barcode\BarcodeService;

class MasukService
{
   
    static public function index($r)
    {
        if(auth()->user()->role != 'admin'){
            $masuk = Masuk::where('gudang_id',auth()->user()->gudang_id)->orderByDesc('created_at')->paginate(30);
        }else{
            if($r->masuk != null){
                $masuk = Masuk::where('id',$r->masuk)->orderByDesc('created_at')->paginate(30);
            }else{
                $masuk = Masuk::orderByDesc('created_at')->paginate(30);

            }
        }
        return compact('masuk');
    }
    static public function create()
    {
        $barang = Barang::get();
        $gudang = Gudang::get();
        $suplier = Suplier::get();
        return compact(['barang', 'gudang', 'suplier']);
    }
    static public function edit($id)
    {
        $barang = Barang::get();
        $gudang = Gudang::get();
        $suplier = Suplier::get();
        return compact(['barang','gudang','suplier','id']);

    }
    static public function store($data)
    {
      
        DB::transaction(function() use ($data) {
            $log = new LogController;
            for ($i = 0; $i < count($data->barang); $i++) {
                $ss = Masuk::create([
                    'suplier_id' => $data->suplier,
                    'gudang_id' => $data->gudang,
                    'user_id' => auth()->user()->id,
                    'barang_id' => $data->barang[$i],
                    'kuantiti' => (int)$data->kuantiti[$i],
                    'harga_satuan' => (int)$data->harga[$i],
                    'kode_akuntan' => $data->kode_akuntan[$i],
                ]);
                $log->create('menambah barang masuk #'.$ss->barang->name,'masuk',$ss->id);
                for ($z = 0; $z < $ss->kuantiti; $z++) {
                    BarcodeService::store($ss);
                }
            }
        });
        return true;
    }
    static public function storeMutasi($b)
    {
        $log = new LogController;
        $masuk = Masuk::create([
                'suplier_id' => $b->masuk->suplier->id,
                'gudang_id' => auth('sanctum')->user() == null ? auth()->user()->gudang_id : auth('sanctum')->user()->gudang_id,
                'user_id' => auth('sanctum')->user() == null ? auth()->user()->id : auth('sanctum')->user()->id,
                'barang_id' => $b->masuk->barang->id,
                'kuantiti' => 1,
                'harga_satuan' => $b->masuk->harga_satuan,
                'kode_akuntan' => $b->masuk->kode_akuntan,
        ]);
        $masuk->barcode()->create([
                'user_id' => auth('sanctum')->user()->id,
                'kode' => $b->kode,
                'status' => 'aktif'
            ]);
            $b->mutasi()->update([
                'status' => 'diterima'
            ]);
            $log->create('menambah barang masuk #'.$masuk->barang->name,'masuk',$masuk->id);

            return true;
    }
    static public function update($data, $masuk)
    {
        if ($masuk->kuantiti > $data->kuantiti) {
            $masuk->barcode()->take($masuk->kuantiti - $data->kuantiti)->delete();
        } elseif ($masuk->kuantiti < $data->kuantiti) {
            for ($i = 0; $i < $data->kuantiti - $masuk->kuantiti; $i++) {
                BarcodeService::store($masuk);
            }
        }
        $log = new LogController;

        $masuk->update([
            'suplier_id' => $data->suplier,
            'gudang_id' => $data->gudang,
            'user_id' => auth()->user()->id,
            'barang_id' => $data->barang,
            'kuantiti' => $data->kuantiti,
            'harga_satuan' => $data->harga,
            'kode_akuntan' => $data->kode_akuntan . Str::random(2),
        ]);
        $log->create('mengubah barang masuk #'.$masuk->barang->name,'masuk',$masuk->id);

        return true;
    }
}
