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
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/', [AdminController::class, 'dashboard'])->name('dashboard');
Route::middleware('auth')->get('/questions', [AdminController::class, 'questions'])->name('admin.questions');
Route::middleware('auth')->get('/questions/answered', [AdminController::class, 'questions_answered'])->name('admin.questions.answered');
Route::middleware('auth')->get('/questions/unanswered', [AdminController::class, 'questions_unanswered'])->name('admin.questions.unanswered');
Route::middleware('auth')->get('/question/{id}', [AdminController::class, 'question_view'])->name('admin.question.view');

// Articles
Route::middleware('auth')->get('/articles', [AdminController::class, 'articles'])->name('admin.articles');
Route::middleware('auth')->get('/articles/new', [AdminController::class, 'new_article'])->name('admin.article.new');
Route::middleware('auth')->post('/articles/new', [AdminController::class, 'new_article_post'])->name('admin.article.post');
Route::middleware('auth')->get('/articles/{id}', [AdminController::class, 'view_article'])->name('admin.article.view');
Route::middleware('auth')->get('/articles/edit/{id}', [AdminController::class, 'edit_article'])->name('admin.article.edit');
Route::middleware('auth')->post('/articles/edit', [AdminController::class, 'edit_article_post'])->name('admin.article.edit.post');
Route::middleware('auth')->get('/articles/delete/{id}', [AdminController::class, 'delete_article'])->name('admin.article.delete');


// Users
Route::middleware('auth')->get('/users', [AdminController::class, 'users'])->name('admin.users');
Route::middleware('auth')->get('/users/delete/{id}', [AdminController::class, 'user_delete'])->name('admin.user.delete');

// Experts
Route::middleware('auth')->get('/experts', [AdminController::class, 'experts'])->name('admin.experts');
Route::middleware('auth')->get('/experts/{id}', [AdminController::class, 'expert_view'])->name('admin.expert.view');
Route::middleware('auth')->get('/experts/new', [AdminController::class, 'expert_new'])->name('admin.expert.new');
Route::middleware('auth')->get('/expert/approve/{id}', [AdminController::class, 'expert_approve'])->name('admin.expert.approve');
Route::middleware('auth')->post('/experts/new', [AdminController::class, 'expert_new_post'])->name('admin.expert.new.post');
Route::middleware('auth')->get('/experts/pending', [AdminController::class, 'expert_pending'])->name('admin.expert.pending');
Route::middleware('auth')->get('/experts/delete/{id}', [AdminController::class, 'expert_delete'])->name('admin.expert.delete');

// Settings
// Route::get('/admin/settings', ['as' => 'settings', 'uses' => 'WebController@settings'])->middleware('auth');un-questions.blade.php






// Route::get('/admin/questions/', ['as' => 'anQuestions', 'uses' => 'WebController@questions_an'])->middleware('auth');