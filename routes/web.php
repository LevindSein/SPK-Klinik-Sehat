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

//LOGIN
Route::get('/', 'Auth\LoginController@index');
//LOGIN
Route::get('login','Auth\LoginController@index')->name('index');
Route::post('storelogin','Auth\LoginController@storeLogin');
//LOGOUT
Route::get('logout','Auth\LoginController@logout');

//MASTER
Route::get('master/index','MasterController@index')->name('masterindex');

//Alternatif
Route::get('alternatif','AlternatifController@index')->name('alternatif');
Route::post('alternatif/add','AlternatifController@add');
Route::get('alternatif/delete/{id}','AlternatifController@delete');

//Kriteria
Route::get('kriteria','KriteriaController@index');

//Nilai
Route::get('nilai','NilaiController@index');

//Electre
Route::get('electre','ElectreController@index');

//Laporan
Route::get('laporan','LaporanController@index');
Route::get('laporan/print/{bln}','LaporanController@print');

//User
Route::get('users','UserController@index')->name('users');
Route::post('user/add','UserController@add');
Route::get('user/reset/{id}','UserController@reset');
Route::get('user/delete/{id}','UserController@delete');

//Kategori
Route::get('kategori','KategoriController@index')->name('kategori');
Route::post('kategori/add','KategoriController@add');
Route::get('kategori/delete/{id}','KategoriController@delete');

//Supplier
Route::get('supplier','SupplierController@index')->name('supplier');
Route::post('supplier/add','SupplierController@add');
Route::get('supplier/delete/{id}','SupplierController@delete');