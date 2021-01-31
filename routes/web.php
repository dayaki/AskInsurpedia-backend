<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Index
// Route::get('/', ['as' => 'home', 'uses' => 'WebController@home']);
// Route::get('/admin/login', ['as' => 'login', 'uses' => 'WebController@login']);
// Route::post('/admin/login', ['as' => 'post_login', 'uses' => 'WebController@post_login']);
// Route::get('/admin/logout', ['as' => 'logout', 'uses' => 'WebController@logout']);


Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login_post'])->name('login_post');

Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/questions', [AdminController::class, 'questions'])->name('admin.questions');
Route::get('/questions/answered', [AdminController::class, 'questions_answered'])->name('admin.questions.answered');
Route::get('/questions/unanswered', [AdminController::class, 'questions_unanswered'])->name('admin.questions.unanswered');
Route::get('/question/{id}', [AdminController::class, 'question_view'])->name('admin.question.view');

// Articles
Route::get('/articles', [AdminController::class, 'articles'])->name('admin.articles');
Route::get('/articles/new', [AdminController::class, 'new_article'])->name('admin.article.new');
Route::post('/articles/new', [AdminController::class, 'new_article_post'])->name('admin.article.post');
Route::get('/articles/{id}', [AdminController::class, 'view_article'])->name('admin.article.view');
Route::get('/articles/edit/{id}', [AdminController::class, 'edit_article'])->name('admin.article.edit');
Route::post('/articles/edit', [AdminController::class, 'edit_article_post'])->name('admin.article.edit.post');
Route::get('/articles/delete/{id}', [AdminController::class, 'delete_article'])->name('admin.article.delete');


// // Users
// Route::get('/admin/users', ['as' => 'users', 'uses' => 'WebController@users'])->middleware('auth');
// Route::get('/admin/users/rm/{id}', ['as' => 'deleteUser', 'uses' => 'WebController@user_delete'])->middleware('auth');

// Settings
// Route::get('/admin/settings', ['as' => 'settings', 'uses' => 'WebController@settings'])->middleware('auth');un-questions.blade.php






// Route::get('/admin/questions/', ['as' => 'anQuestions', 'uses' => 'WebController@questions_an'])->middleware('auth');