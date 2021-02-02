<?php

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
        Route::put('/edit',[UserController::class,'edit']);
        Route::put('/delete',[UserController::class,'delete']);
    });
});
