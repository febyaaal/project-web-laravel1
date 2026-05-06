<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\HomeController;

Route::get('/', [MasyarakatController::class, 'index'])->name('masyarakat.index');

Route::get('/masyarakat/create', [MasyarakatController::class, 'create'])->name('masyarakat.create');


Route::post('/masyarakat/store', [MasyarakatController::class, 'store'])->name('masyarakat.store');

Route::get('/masyarakat/{id}', [MasyarakatController::class, 'show'])->name('masyarakat.show');

Route::get('/masyarakat/{id}/edit', [MasyarakatController::class, 'edit'])->name('masyarakat.edit');

Route::put('/masyarakat/{id}', [MasyarakatController::class, 'update'])->name('masyarakat.update');

Route::delete('/masyarakat/{id}', [MasyarakatController::class, 'destroy'])->name('masyarakat.destroy');
Auth::routes();

