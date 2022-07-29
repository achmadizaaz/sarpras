<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SubBangunanController;
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
        Route::post('/bangunan/store', 'store')->name('bangunan.store');
        Route::post('/bangunan/update', 'update')->name('bangunan.update');
        Route::delete('/bangunan/{id}/remove', 'destroy')->name('bangunan.delete');
    });

    Route::controller(SubBangunanController::class)->group(function(){
        Route::get('/sub-bangunan', 'index')->name('sub-bangunan.index');
    });


// END PREFIX DASHBOARD
});
require __DIR__.'/auth.php';
