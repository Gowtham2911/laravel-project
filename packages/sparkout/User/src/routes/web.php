<?php

use Illuminate\Support\Facades\Route;
use Sparkout\User\app\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/users',[PostController::class,'index'])->name('user.index');
Route::post('/user',[PostController::class,'store'])->name('user.store');
Route::get('/home',[PostController::class,'list'])->name('user.list')->middleware(['web','admin']);
Route::get('/user-edit/{id}',[PostController::class,'edit'])->name('user.edit');
Route::put('/user-update/{id}',[PostController::class,'update'])->name('user.update');
Route::get('/user-delete/{id}',[PostController::class,'destroy'])->name('user.destroy');


Route::get('/file',[PostController::class,'file'])->name('user.file');
Route::post('/store-file',[PostController::class,'fileUpload'])->name('user.upload');

Route::get('/calculate/{name}',[PostController::class,'calculate'])->name('calculate');