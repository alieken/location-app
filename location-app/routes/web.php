<?php

use App\Http\Controllers\KonumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [KonumController::class, 'liste'])->name('konums.liste');
Route::get('/add', [KonumController::class, 'add'])->name('konums.add');
Route::post('/store', [KonumController::class, 'store'])->name('konums.store');
Route::get('/liste', [KonumController::class, 'liste'])->name('konums.liste');
Route::get('/show/{id}', [KonumController::class, 'show'])->name('konums.show');
Route::get('/edit/{id}', [KonumController::class, 'edit'])->name('konums.edit');
Route::post('/edit/{id}', [KonumController::class, 'edit_done'])->name('konums.edit_done');
Route::delete('/delete/{id}', [KonumController::class, 'delete'])->name('konums.delete');
Route::get('/konum/{id}', [KonumController::class, 'konum'])->name('konums.konum');
