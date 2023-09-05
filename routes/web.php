<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Stalls;
use App\Http\Controllers\Employees;

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

Route::get('/stalls',[Stalls::class,'index'])->name('stalls.index');
Route::get('/stalls/create',[Stalls::class,'create'])->name('stalls.create');
Route::post('/stalls',[Stalls::class,'store'])->name('stalls.store');
Route::get('/stalls/{idpuesto}',[Stalls::class,'edit'])->name('stalls.edit');
Route::post('/stalls/update',[Stalls::class,'update'])->name('stalls.update');
Route::get('/stalls/delete/{id}',[Stalls::class,'delete'])->name('stalls.delete');
Route::get('/employees',[Employees::class,'index'])->name('employees.index');
Route::get('/employees/create',[Employees::class,'create'])->name('employees.create');
Route::post('/employees',[Employees::class,'store'])->name('employees.store');
Route::get('/employees/delete/{id}',[Employees::class,'delete'])->name('employees.delete');
Route::get('/employees/{idempleado}',[Employees::class,'edit'])->name('employees.edit');
Route::post('/employees/update',[Employees::class,'update'])->name('employees.update');