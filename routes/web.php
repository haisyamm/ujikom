<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\PetugasController;


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
Route::get('/', [CustomAuthController::class, 'dashboard']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('petugas/{petugas}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::post('petugas/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
// Route::get('petugas/create', [PetugasController::class, 'create']); 
// Route::post('petugas/create', [PetugasController::class, 'store'])->name('petugas.simpan');

Route::get('petugas/report', [PetugasController::class, 'report'])->name('report.petugas'); 
Route::get('petugas/exportpdf', [PetugasController::class, 'exportPdf'])->name('report.petugas.pdf'); 
Route::resource('petugas', PetugasController::class);
