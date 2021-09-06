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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', function () {

        return view('admin.index');
    });
    Route::resource('account', 'AccountController');

});

Route::group(['prefix' => 'gudang', 'middleware' => ['auth', 'role:gudang']], function() {
    Route::get('/', function () {

        return view('admin.index');
    });
    Route::resource('bpb', 'BpbController');
    Route::resource('bahanbaku', 'BahanBakuController');
    Route::resource('penerimaanbarang', 'PenerimaanBahanController');
    Route::get('/laporan/gudang', function () {

        return view('laporan.gudang');
    })->name('laporan.gudang');
});

Route::group(['prefix' => 'pembelian', 'middleware' => ['auth', 'role:pembelian']], function() {
    Route::get('/', function () {

        return view('admin.index');
    });
    Route::resource('order', 'OrderController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('transaksi', 'TransaksiController');
});


Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'role:pimpinan']], function() {
    Route::get('/', function () {

        return view('admin.index');
    });
    Route::get('/laporan/pimpinan', function () {

        return view('laporan.pimpinan');
    })->name('laporan.pimpinan');
    Route::get('laporan', 'OrderController@laporan')->name('laporan');
});


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



