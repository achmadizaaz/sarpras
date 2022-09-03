<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SubBangunanController;
use App\Http\Controllers\SumberController;
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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth'])->group(function(){

    // Profil Route
    Route::controller(ProfilController::class)->group(function(){
        Route::get('/profil', 'index')->name('profil.index');
        Route::get('/profil/edit', 'edit')->name('profil.edit');
        Route::post('/profil/update', 'update')->name('profil.update');
    });

    Route::controller(BangunanController::class)->group(function(){
        Route::get('/bangunan', 'index')->name('bangunan.index');
        Route::get('/create', 'create')->name('bangunan.create');
        Route::post('/bangunan/store', 'store')->name('bangunan.store');
        Route::get('/{slug}/edit', 'edit')->name('bangunan.edit');
        Route::put('/update', 'update')->name('bangunan.update');
        Route::delete('/bangunan/{id}/remove', 'destroy')->name('bangunan.delete');
    });

    Route::controller(SubBangunanController::class)->prefix('bangunan')->group(function(){
        Route::get('/sub-bangunan', 'index')->name('sub-bangunan.index');
        Route::post('/sub-bangunan', 'store')->name('sub-bangunan.store');
        Route::put('/sub-bangunan', 'update')->name('sub-bangunan.update');
        Route::delete('/sub-bangunan/{id}/remove', 'destroy')->name('sub-bangunan.delete');
    });
    Route::controller(RuanganController::class)->prefix('bangunan/sub-bangunan')->group(function(){
        Route::get('/ruangan', 'index')->name('ruangan.index');
        Route::post('/ruangan', 'store')->name('ruangan.store');
        Route::get('/ruangan/{id}/edit', 'edit')->name('ruangan.edit');
        Route::put('/ruangan', 'update')->name('ruangan.update');
        Route::post('/ruangan/remove', 'destroy')->name('ruangan.delete');
    });

    Route::get('bangunan/sub-bangunan/{id}', function ($id) {
        $sub_bangunan = App\Models\SubBangunan::where('bangunan_id',$id)->get();
        return response()->json($sub_bangunan);
    })->name('getSubBangunan');


    Route::controller(KategoriController::class)->prefix('kategori')->group(function(){
        Route::get('/', 'index')->name('kategori.index');
        Route::get('/create', 'create')->name('kategori.create');
        Route::post('/store', 'store')->name('kategori.store');
        Route::get('/{id}/edit', 'edit')->name('kategori.edit');
        Route::put('/update', 'update')->name('kategori.update');
        Route::post('/remove', 'destroy')->name('kategori.delete');
    });

    Route::controller(SumberController::class)->prefix('sumber')->group(function(){
        Route::get('/', 'index')->name('sumber.index');
        Route::get('/create', 'create')->name('sumber.create');
        Route::post('/store', 'store')->name('sumber.store');
        Route::get('/{id}/edit', 'edit')->name('sumber.edit');
        Route::put('/update', 'update')->name('sumber.update');
        Route::post('/remove', 'destroy')->name('sumber.delete');
    });

    Route::controller(BarangController::class)->prefix('barang')->group(function(){
        Route::get('/', 'index')->name('barang.index');
        Route::get('/create', 'create')->name('barang.create');
    });


// END PREFIX DASHBOARD
});
require __DIR__.'/auth.php';
