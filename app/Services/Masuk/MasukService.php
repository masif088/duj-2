<?php

namespace Services\Masuk;

use App\Models\Barang;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Masuk;
use App\Models\Suplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasukService
{
    static public function index()
    {
        $masuk = Masuk::get();
        return compact('masuk');
    }
    static public function create()
    {
        $barang = Barang::get();
        $gudang = Gudang::get();
        $suplier = Suplier::get();
        return compact(['barang', 'gudang', 'suplier']);
    }
    static public function store($data)
    {
        DB::transaction(function () use ($data) {
            for ($i = 0; $i < count($data->barang); $i++) {
                $ss = Masuk::create([
                    'suplier_id' => $data->suplier,
                    'gudang_id' => $data->gudang,
                    'user_id' => auth()->user()->id,
                    'barang_id' => $data->barang[$i],
                    'kuantiti' => (int)$data->kuantiti[$i],
                    'harga_satuan' => (int)$data->harga[$i],
                    'kode_akuntan' => $data->kode_akuntan[$i].Str::random(2),
                ]);
                for ($z = 0; $z < (int)$ss->kuantiti; $z++) {
                    Barcode::create([
                        'masuk_id' => $ss->id,
                        'kode' => mt_rand(10000000, 99999999),
                    ]);
                }
            }
        });
        return true;
    }
    static public function update($data, $masuk)
    {
        if ($masuk->kuantiti > $data->kuantiti) {
            $masuk->barcode()->take($masuk->kuantiti - $data->kuantiti)->delete();
        } elseif ($masuk->kuantiti < $data->kuantiti) {
            for ($i = 0; $i < $data->kuantiti - $masuk->kuantiti; $i++) {
                Barcode::create([
                    'masuk_id' => $data->id,
                    'kode' => mt_rand(10000000, 99999999),
                ]);
            }
        } else {
            return 'error';
        }
        $masuk->update([
            'suplier_id' => $data->suplier,
            'gudang_id' => $data->gudang,
            'user_id' => auth()->user()->id,
            'barang_id' => $data->barang,
            'kuantiti' => $data->kuantiti,
            'harga_satuan' => $data->harga,
            'kode_akuntan' => $data->kode_akuntan . Str::random(2),
        ]);
        return true;
    }
}
