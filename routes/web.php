<?php

use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EmpresaController;
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
Route::get('cuenta/crear', [CuentaController::class,'create'])->name('cuenta.create');
Route::post('cuenta',[CuentaController::class,'store'])->name('cuenta.store');

//----------------------------  Empresas ----------------------------------------------
//listar
Route::get('empresa', [EmpresaController::class,'index'])->name('empresa.index');
//Crear
Route::get('empresa/create', [EmpresaController::class,'create'])->name('empresa.create');
Route::post('empresa/store',[EmpresaController::class,'store'])->name('empresa.store');
//actualizar
Route::get('empresa/edit/{empresa}', [EmpresaController::class,'edit'])->name('empresa.edit');
Route::put('empresa/update/{empresa}', [EmpresaController::class,'update'])->name('empresa.update');
//Eliminar
Route::get('empresa/destroy/{empresa}', [EmpresaController::class,'destroy'])->name('empresa.destroy');
