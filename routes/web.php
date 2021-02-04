<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',function(){
    return view('frontend.auth.login');

});
Route::get('/register',function(){
    return view('frontend.auth.register');

});
Route::get('/profil',function(){
    return view('frontend.profil.profil');

});
Route::get('/barang',function(){
    return view('frontend.barang.barang');

});
Route::get('/barang_masuk',function(){
    return view('frontend.barang.barang_masuk');

});
