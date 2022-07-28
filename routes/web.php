<?php

use App\Http\Controllers\ProfilController;
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

// Profil

Route::get('dashboard/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('dashboard/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('dashboard/profil/update', [ProfilController::class, 'update'])->name('profil.update');

require __DIR__.'/auth.php';
