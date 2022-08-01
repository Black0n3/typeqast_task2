<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'sites.homepage')->name('homepage');
Route::view('/task-1', 'sites.task1')->name('task1');
Route::view('/task-2', 'sites.task2')->name('task2');
Route::view('/documentation', 'sites.docs')->name('docs');
