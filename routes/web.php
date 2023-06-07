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
Auth::routes();
//Capture all routes to point to new SPA, exempt login/register
Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '^((?!login|register).)*$');

/*
DELETE: Once refactor for vue router is set
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
*/
