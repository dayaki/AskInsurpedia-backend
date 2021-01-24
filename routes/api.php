<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

// Auth
Route::middleware('api')->post('/signup', [AppController::class, 'signup']);
Route::middleware('api')->post('/login', 'AppController@login');
Route::middleware('api')->post('/fb', 'AppController@login_fb');
Route::middleware('api')->post('/google', 'AppController@login_google');
Route::middleware('api')->post('/linkedin', 'AppController@login_linkedin');
Route::middleware('api')->post('forgotpass', 'AppController@forgotpassword');

// Questions
Route::middleware('api')->post('/questions/post', 'AppController@postQuestions');
Route::middleware('api')->get('/questions/all', 'AppController@getQuestions');

// Comments
Route::middleware('api')->post('/questions/comment', 'AppController@postComment');

// Articles
Route::middleware('api')->get('/articles', 'AppController@articles');

// User Settings
Route::middleware('api')->post('/user/password', 'AppController@password');
Route::middleware('api')->post('/user/photo', 'AppController@user_photo');
Route::middleware('api')->post('/user/category/update', 'AppController@update_category');
Route::middleware('api')->post('/user/category/all', 'AppController@all_category');
Route::middleware('api')->post('/risks', 'AppController@risks');
Route::middleware('api')->post('/bexpert', 'AppController@bexpert');

// Send Mail
Route::middleware('api')->post('/mail/later', 'AppController@sendMail');
