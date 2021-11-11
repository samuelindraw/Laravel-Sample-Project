<?php

use App\Http\Controllers\crudController;
use App\Http\Controllers\hitungController;

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
Route::post('/',[hitungController::class,'hitung']);
Route::get('/',[hitungController::class,'index']);
Route::get('/bahancrud',[crudController::class,'index']);
Route::get('/tambahData',[crudController::class,'tambah']);
Route::post('/tambahData',[crudController::class,'simpan']);
Route::get('/bahancrud/{id}',[crudController::class,'editData']);
Route::post('/editData',[crudController::class,'update']);
Route::delete('/destroy/{id}', [crudController::class, 'destroy'])->name('destroy');
Route::post('/bahancrud/cari',[crudController::class,'cari']);
Route::get('/student', 'StudentController@index');
Route::get('/student/export_excel', 'StudentController@export_excel');
Route::post('/student/import_excel', 'StudentController@import_excel');
Route::get('/student', 'StudentController@index');
Route::get('/student/cetak_pdf', 'StudentController@cetak_pdf');