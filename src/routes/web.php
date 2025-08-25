<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);



Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin'); // 管理画面ビュー
    })->name('admin');
});
