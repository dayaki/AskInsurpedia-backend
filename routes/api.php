<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

// Auth
Route::middleware('api')->post('/signup', [AppController::class, 'signup']);
Route::middleware('api')->post('/login', [AppController::class, 'login']);
Route::middleware('api')->post('/forgot-password', [AppController::class, 'forgot_password']);

// Route::middleware('api')->post('/fb', 'AppController@login_fb');
// Route::middleware('api')->post('/google', 'AppController@login_google');
// Route::middleware('api')->post('/linkedin', 'AppController@login_linkedin');

// Questions
Route::middleware('api')->get('/questions', [AppController::class, 'questions']);
Route::middleware('api')->post('/question', [AppController::class, 'post_question']);

Route::middleware('api')->post('/question/comment', [AppController::class, 'post_comment']);
Route::middleware('api')->get('/articles', [AppController::class, 'articles']);
Route::middleware('api')->get('/experts', [AppController::class, 'experts']);

// User Settings
Route::middleware('api')->post('/settings/password', [AppController::class, 'settings_password']);
Route::middleware('api')->post('/settings/photo', [AppController::class, 'settings_photo']);
Route::middleware('api')->post('/settings/category', [AppController::class, 'settings_category']);
Route::middleware('api')->post('/settings/category/update', [AppController::class, 'settings_category_update']);
Route::middleware('api')->post('/settings/risk', [AppController::class, 'settings_risks']);
Route::middleware('api')->post('/settings/be-expert', [AppController::class, 'settings_expert']);

// Send Mail
Route::middleware('api')->get('/mailer/later', [AppController::class, 'send_mail']);
