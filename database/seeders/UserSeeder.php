<?php

namespace Database\Seeders;

use App\Models\Gudang;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        User::create([
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
        User::create([
            'name' => 'ketua cabang',
            'email' => 'k@k.com',
            'password' => bcrypt('k'),
            'no_hp' => '0836347637',
            'alamat' => 'jl. malysia',
            'gudang_id' => 1,
            'role' => 'ketua',
        ]);
        User::create([
            'gudang_id' => 1,
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
            'gudang_id' => 1,

        ]);
    }
}
