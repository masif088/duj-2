<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UserController;
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

Route::view('/loginn','frontend.auth.login');
Route::view('/registerr','frontend.auth.register');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// backend
Route::group(['middleware' => ['auth','CheckRole:admin']], function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/create',[UserController::class,'store']);
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[UserController::class,'update']);
        Route::delete('/delete',[UserController::class,'delete']);
    });
    Route::prefix('barang')->name('barang.')->group(function () {
        Route::get('/create',[BarangController::class,'create'])->name('create');
        Route::post('/create',[BarangController::class,'store']);
        Route::get('/edit/{id}',[BarangController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[BarangController::class,'update']);
        Route::delete('/delete',[BarangController::class,'delete']);
    });
    Route::prefix('gudang')->name('gudang.')->group(function () {
        Route::get('/create',[GudangController::class,'create'])->name('create');
        Route::post('/create',[GudangController::class,'store']);
        Route::get('/edit/{id}',[GudangController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[GudangController::class,'update']);
        Route::delete('/delete',[GudangController::class,'delete']);
    });
    Route::prefix('suplier')->name('suplier.')->group(function () {
        Route::get('/create',[SuplierController::class,'create'])->name('create');
        Route::post('/create',[SuplierController::class,'store']);
        Route::get('/edit/{id}',[SuplierController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[SuplierController::class,'update']);
        Route::delete('/delete',[SuplierController::class,'delete']);
    });
    Route::prefix('masuk')->name('masuk.')->group(function () {
        Route::get('/',[MasukController::class,'index'])->name('index');
        Route::get('/create',[MasukController::class,'create'])->name('create');
        Route::post('/create',[MasukController::class,'store']);
        Route::get('/edit/{id}',[MasukController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[MasukController::class,'update']);
        Route::delete('/delete',[MasukController::class,'delete']);
    });
    Route::prefix('barcode')->name('barcode.')->group(function () {
        Route::get('/create',[BarcodeController::class,'create'])->name('create');
        Route::post('/create',[BarcodeController::class,'store']);
        Route::get('/edit/{id}',[BarcodeController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[BarcodeController::class,'update']);
        Route::delete('/delete',[BarcodeController::class,'delete']);
        Route::get('/{id}',[BarcodeController::class,'index'])->name('index');
    });
});
Route::get('/profil',function(){
    return view('frontend.profil.profil');

});
Route::get('/barang',function(){
    return view('frontend.barang.barang');

});
