<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Sheets
Route::get('/sheets', [App\Http\Controllers\SheetController::class, 'index'])->name('sheets');
Route::get('/sheets/create', [App\Http\Controllers\SheetController::class, 'create'])->name('sheets.create');
Route::post('/sheets', [App\Http\Controllers\SheetController::class, 'store'])->name('sheets.store');
Route::get('/sheets/{id}', [App\Http\Controllers\SheetController::class, 'show'])->name('sheets.show');
Route::get('/sheets/{id}/edit', [App\Http\Controllers\SheetController::class, 'edit'])->name('sheets.edit');
Route::patch('/sheets/{id}', [App\Http\Controllers\SheetController::class, 'update'])->name('sheets.update');
Route::delete('/sheets/{id}', [App\Http\Controllers\SheetController::class, 'destroy'])->name('sheets.destroy');
