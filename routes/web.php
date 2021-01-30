<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login_post'])->name('login_post');

Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/questions', [AdminController::class, 'questions'])->name('questions');