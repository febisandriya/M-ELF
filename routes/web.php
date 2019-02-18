<?php

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
  if (Auth::user()) {
         return redirect('/home');
     }
    return view('auth.login');

});

//Modul Mobil
Route::get('/data-mobil', 'ControllerMobil@mobil')->name('data.mobil');
Route::get('/add-mobil', 'ControllerMobil@addMobil')->name('add.mobil');
Route::post('/create-mobil', 'ControllerMobil@createMobil')->name('create.mobil');
Route::post('/delete-mobil/{id}', 'ControllerMobil@deleteMobil')->name('delete.mobil');
Route::get('/edit-mobil{id}', 'ControllerMobil@editMobil')->name('edit.mobil');
Route::post('/update-mobil/{id}', 'ControllerMobil@updateMobil')->name('update.mobil');

//Modul Supir
Route::get('/data-supir', 'ControllerSupir@supir')->name('data.supir');
Route::get('/add-supir', 'ControllerSupir@addSupir')->name('add.supir');
Route::post('/create-supir', 'ControllerSupir@createSupir')->name('create.supir');
Route::post('/delete-supir/{id}', 'ControllerSupir@deleteSupir')->name('delete.supir');
Route::get('/edit-supir{id}', 'ControllerSupir@editSupir')->name('edit.supir');
Route::post('/update-supir/{id}', 'ControllerSupir@updateSupir')->name('update.supir');

//Kategori
Route::get('/data-kategori', 'ControllerKategori@kategori')->name('data.kategori');
Route::get('/add-kategori', 'ControllerKategori@addkategori')->name('add.kategori');
Route::post('/create-kategori', 'ControllerKategori@createKategori')->name('create.kategori');
Route::post('/delete-kategori/{id}', 'ControllerKategori@deleteKategori')->name('delete.kategori');
Route::get('/edit-kategori{id}', 'ControllerKategori@editKategori')->name('edit.kategori');
Route::post('/update-kategori/{id}', 'ControllerKategori@updateKategori')->name('update.kategori');

//darurat
Route::get('/data-darurat', 'ControllerDarurat@darurat')->name('data.darurat');
Route::get('/add-darurat', 'ControllerDarurat@addDarurat')->name('add.darurat');
Route::post('/create-darurat', 'ControllerDarurat@createDarurat')->name('create.darurat');
Route::post('/delete-darurat/{id}', 'ControllerDarurat@deleteDarurat')->name('delete.darurat');
Route::get('/edit-darurat{id}', 'ControllerDarurat@editDarurat')->name('edit.darurat');
Route::post('/update-darurat/{id}', 'ControllerDarurat@updateDarurat')->name('update.darurat');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
