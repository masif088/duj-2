<?php

namespace Database\Seeders;

use App\Models\After;
use App\Models\Barang;
use App\Models\Barcode;
use App\Models\Gudang;
use App\Models\Infra;
use App\Models\Masuk;
use App\Models\Mutasi;
use App\Models\ServiceAfter;
use App\Models\ServiceInfra;
use App\Models\Suplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ['admin','head','ketua','checker','teknisi']);
        Gudang::create([
            'name' => 'pusat'
        ]);
        Gudang::create([
            'name' => 'gudang A'
        ]);
       $h =  User::create([
            'name' => 'HO',
            'email' => 'h@h.com',
            'password' => bcrypt('h'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. jawa',
            'role' => 'head',
            'gudang_id' => 1,

        ]);
        User::create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => bcrypt('a'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. malysia',
            'role' => 'admin',
            'gudang_id' => 1,

        ]);
         $k = User::create([
            'name' => 'ketua cabang',
            'email' => 'k@k.com',
            'password' => bcrypt('k'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. malysia',
            'gudang_id' => 2,
            'role' => 'ketua',
        ]);
        User::create([
            'gudang_id' => 2,
            'name' => 'checker',
            'email' => 'c@c.com',
            'password' => bcrypt('c'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. kali',
            'role' => 'checker',
        ]);
        User::create([
            'name' => 'teknisi',
            'email' => 't@t.com',
            'password' => bcrypt('t'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. mayang',
            'role' => 'teknisi',
            'gudang_id' =>2,

        ]);
        for ($i=0; $i < 10; $i++) { 
            $g = Gudang::create([
                'name' => 'gudang B'.$i
            ]);
            $s = Suplier::create([
                'name' => 'suplier '.$i,
                'alamat' => 'pasuruan',
                'no_hp' => '093847384'
            ]);
            $b = Barang::create([
                'name' => 'sabun '.$i 
            ]);
            $ss = Masuk::create([
                'suplier_id' => $s->id,
                'gudang_id' => 1,
                'user_id' => $h->id,
                'barang_id' => $b->id,
                'kuantiti' => 50,
                'harga_satuan' => 12000+($i*100),
                'kode_akuntan' => 'kukuk'.$i,
            ]);
            for ($z = 0; $z < $ss->kuantiti; $z++) {
                $ss->barcode()->create([
                    'user_id' => $h->id,
                    'kode' => mt_rand(10000000, 99999999),
                ]);
            }
            $sss = Masuk::create([
                'suplier_id' => $s->id,
                'gudang_id' => 2,
                'user_id' => $h->id,
                'barang_id' => $b->id,
                'kuantiti' => 1,
                'harga_satuan' => 12000+($i*100),
                'kode_akuntan' => 'kukuk'.$i,
            ]);
            for ($z = 0; $z < $sss->kuantiti; $z++) {
                $sss->barcode()->create([
                    'user_id' => $h->id,
                    'kode' => mt_rand(10000000, 99999999),
                    'status' => 'aktif'
                ]);
            }
        }
       Barcode::take(20)->update([
           'status' => 'aktif'
       ]);
       Barcode::whereHas('masuk',function($x){
           return $x->where('gudang_id',2);
       })->update([
           'status' => 'aktif'
       ]);
       Barcode::whereHas('masuk',function($x){
        return $x->where('gudang_id',2);
    })->take(2)->update([
        'status' => 'terjual'
    ]);
    $bv = Barcode::whereHas('masuk',function($x){
        return $x->where('gudang_id',2);
    })->where('status','terjual')->get();
    foreach ($bv as $value) {
        $after = After::create([
            'user_id' => 1,
            'barcode_id' => $value->id,
            'gudang_id' => 2,
            'nama_pembeli' => Str::random(4),
            'alamat' => 'jember',
            'no_hp' => '083758378'
        ]);
        ServiceAfter::create([
            'after_id' => $after->id,
            'deskripsi' => 'tidqak bisa dimakan',
            'file' => 'google.com'
        ]);
    }
        $cc = Barcode::where('status','aktif')->take(10)->get();
        foreach ($cc as $value) {
            $value->update([
                'status' => 'mutasi'
            ]);
            Mutasi::create([
                'user_id' => $h->id,
                'gudang_id' => 2,
                'barcode_id' => $value->id,
                'kode_mutasi' => Str::random(6),
            ]);
        }
        for ($i=0; $i < 10; $i++) { 
                Infra::create([
                'user_id' => $k->id,
                'gudang_id' => 2,
                'name' => 'papan tulis '.$i,
                'kode' => Str::random(6),
            ]);
        }
        $in = Infra::take(5)->get();
        foreach ($in as $key => $value) {
            # code...
            $value->update([
                'status' => 'rusak',
                ]);
            ServiceInfra::create([
                'file' => 'https://drive.google.com/file/d/1DL7hrsmdHe4cDydVYhBU72lCFpRL_lFJ/view?usp=sharing',
                'infra_id' => $value->id,
                'deskripsi' => 'barang saya hancur..'
            ]);
        }
    }
}
