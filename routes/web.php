<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;

Route::get('/', function () {
    return view('imghero');
});



Route::get('/', [ImgController::class, 'index'])->name('imghero');
Route::post('/', [ImgController::class, 'store'])->name('imghero.store');
Route::delete('/{id}', [ImgController::class, 'destroy'])->name('imghero.destroy');




require __DIR__.'/auth.php';
