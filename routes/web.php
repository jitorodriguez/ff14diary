<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\EntryController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Setup resource routes for Characters
//Route::resource('characters', CharactersController::class);

//Route::resource('entries', EntryController::class);

Route::group(['middleware' => 'web'], function(){

    Route::resource('characters', CharactersController::class);
    Route::resource('entries', EntryController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
