<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register','App\Http\Controllers\ValidationController@registerValidation')->name('form');
Route::post('/post-register', 'App\Http\Controllers\ValidationController@validateRegister')->name('valid');
Route::get('/login', 'App\Http\Controllers\ValidationController@loginpage')->name('login');
Route::post('/post-login', 'App\Http\Controllers\ValidationController@loginform')->name('auth');
