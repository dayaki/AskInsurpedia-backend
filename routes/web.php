<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'login'])->name('login');
Route::post('/', [AdminController::class, 'login_post'])->name('login_post');