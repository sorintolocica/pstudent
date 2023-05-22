<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
Use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'PagesController@index')->name('pages.home');
    Route::get('/news', 'PagesController@news')->name('pages.news');
    Route::get('/news-post', 'PagesController@news_post')->name('pages.news-post');
    Route::get('/login', 'AuthController@showLoginForm')->name('pages.login');
    Route::post('/login', 'AuthController@login');
    Route::get('/register', 'AuthController@showRegistrationForm')->name('pages.register');
    Route::post('/register', 'AuthController@register');
    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/add-news', 'NewsController@showAddForm')->name('add-news');
    Route::post('/add-news', 'NewsController@addNews')->name('add-news-submit');
    Route::get('/news-post/{id}', [NewsController::class, 'show'])->name('pages.news-post');

    Route::post('/news-post/{newsId}/comments', [CommentsController::class, 'store'])->name('news.comments.store');
    Route::delete('news-post/{newsId}/comments/{commentId}', [CommentsController::class, 'destroy'])->name('news.comments.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('pages.add-category');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('pages.add-category');
    Route::get('/news/category/{category_id}', [NewsController::class, 'newsByCategory'])->name('pages.show-category');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
