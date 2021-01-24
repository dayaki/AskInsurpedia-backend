<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth
Route::middleware('api')->post('/signup', 'AppController@signup');
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
