<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/edit', [ContactController::class, 'edit']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/store', [ContactController::class, 'store']);



Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/search', [AdminController::class, 'search']);
});
