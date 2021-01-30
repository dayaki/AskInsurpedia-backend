<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/articles', ['as' => 'articles', 'uses' => 'WebController@articles'])->middleware('auth');
Route::get('/admin/article/new', ['as' => 'newArticle', 'uses' => 'WebController@article_new'])->middleware('auth');
Route::post('/admin/article/new', ['as' => 'postArticle', 'uses' => 'WebController@article_post'])->middleware('auth');
Route::get('/admin/article/edit/{id}', ['as' => 'editArticle', 'uses' => 'WebController@article_edit'])->middleware('auth');
Route::post('/admin/article/edit', ['as' => 'postEditArticle', 'uses' => 'WebController@article_post_edit'])->middleware('auth');
Route::get('/admin/article/rm/{id}', ['as' => 'deleteArticle', 'uses' => 'WebController@article_delete'])->middleware('auth');



Route::get('/admin/questions/', ['as' => 'anQuestions', 'uses' => 'WebController@questions_an'])->middleware('auth');
Route::get('/admin/questions/', ['as' => 'unQuestions', 'uses' => 'WebController@questions_un'])->middleware('auth');