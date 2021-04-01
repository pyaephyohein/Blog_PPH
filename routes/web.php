<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CommentController;

Route::get('/',[ArticleController::class, 'index']); // laravel 8
Route::get('/articles',[ArticleController::class, 'index']); // laravel 8
Route::get('/articles/detail/{id}',[ArticleController::class, 'detail']); // laravel 8
Route::get('/articles/add',[ArticleController::class, 'add']);
Route::post('articles/add',[ArticleController::class, 'create']);
Route::get('/articles/delete/{id}',[ArticleController::class,'delete']);
Route::post('/comments/add' ,[CommentController::class,'create']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);

Route::get('/product',[ProductController::class, 'index']); //laravel 8 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
