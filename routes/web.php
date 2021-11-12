<?php

use App\Http\Controllers\crudController;
use App\Http\Controllers\hitungController;
use App\Http\Controllers\teskecilController;

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

//Teskecil
Route::get('/teskecil/hitungabjad',[teskecilController::class,'cekabjad']);
Route::post('/teskecil/hitungabjad',[teskecilController::class,'hitungabjad']);
//cek tanggal
Route::get('/teskecil/cekkalender',[teskecilController::class,'cekkalender']);
Route::post('/teskecil/cekkalender',[teskecilController::class,'validkalender']);
//Pisah string
Route::get('/teskecil/pisahstr',[teskecilController::class,'pisahstr']);
Route::post('/teskecil/pisahstr',[teskecilController::class,'cekstr']);
//convet pembilang uang
Route::get('/teskecil/pisahstr',[teskecilController::class,'pisahstr']);
Route::post('/teskecil/pisahstr',[teskecilController::class,'cekstr']);
//Deret Fibonaci
Route::get('/teskecil/fibonaci',[teskecilController::class,'fibonaci']);
Route::post('/teskecil/fibonaci',[teskecilController::class,'fibonaci_proses']);

//Deret Angka
Route::get('/teskecil/deretangka',[teskecilController::class,'deretangka']);
Route::post('/teskecil/deretangka',[teskecilController::class,'deretangka_proses']);

//Counter 4digit
Route::get('/teskecil/counter',[teskecilController::class,'counter4digit']);
Route::post('/teskecil/counter',[teskecilController::class,'counter_proses']);
//Bintang Pyramid
Route::get('/teskecil/bintang',[teskecilController::class,'bintang']);
Route::post('/teskecil/bintang',[teskecilController::class,'bintang_proses']);
//Separator
Route::get('/teskecil/separator',[teskecilController::class,'separator']);
Route::post('/teskecil/separator',[teskecilController::class,'separator_proses']);

//jamtambah
Route::get('/teskecil/jamtambah',[teskecilController::class,'jamtambah']);
Route::post('/teskecil/jamtambah',[teskecilController::class,'jamtambah_proses']);