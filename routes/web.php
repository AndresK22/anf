<?php

use App\Http\Controllers\CuentaController;
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
    return view('dashboard');
});


Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('cuenta', [CuentaController::class,'index'])->name('cuenta.index');
//crear
Route::get('cuenta/crear/{empresa}', [CuentaController::class,'create'])->name('cuenta.create');
Route::post('cuenta',[CuentaController::class,'store'])->name('cuenta.store');
