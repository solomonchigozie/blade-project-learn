<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/blog/insert', [BlogController::class, 'insertblog']);

Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class, 'contactsubmit'])->name('contact.submit');

