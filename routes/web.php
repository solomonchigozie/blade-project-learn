<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/blog/insert', [BlogController::class, 'insertblog']);

Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class, 'contactsubmit'])->name('contact.submit');

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('/file-upload', [FileUploadController::class, 'store'])->name('file.store');
Route::get('/file-download', [FileUploadController::class, 'download'])->name('file.download');


//always define extra routes at the top
Route::get('/customers/trash', [CustomerController::class,'trashIndex'])->name('customers.trash');
Route::get('/customers/restore/{customers}', [CustomerController::class,'restore'])->name('customers.restore');
Route::delete('/customers/trash/{customers}', [CustomerController::class,'forceDestroy'])->name('customers.force.destroy');
Route::resource('customers', CustomerController::class);