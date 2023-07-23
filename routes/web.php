<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\EntryController;

//Models
use App\Models\Server;
use App\Models\Job;
use App\Models\Character;

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

//Retrieve user information for inital load of Home Component
Route::get('/get-home-data', function(){
    $user = Auth::user();

    return response()->json([
        'name' => $user->name,
        'hasCharacters' => !empty($user->characters->count()),
        'entries' => $user->entries->all()
    ]);
});

//Retrieve users character data
Route::get('/get-character-data', function(){
    $user = Auth::user();

    return response()->json([
        'characters' => $user->characters->all()
    ]);
});

//Retrieves characters jobs
Route::get('/get-character-form-data/{id}', function($id){

    //Retrieve default user, servers, and jobs for general response data
    $user = Auth::user();
    $servers = Server::All();
    $jobs = Job::All();

    //Set initial response (create)
    $response = array(
        'servers' => $servers,
        'jobs' => $jobs,
        'characterid' => $id
    );

    //Update reponse with character data when found (edit)
    $character = Character::where(array('id' => $id, 'user_id' => $user->id))->first();
    if(!empty($character))
    {
        $response = array_merge($response, array(
            'name' => $character->name,
            'serverid' => $character->server,
            'activejobs' => $character->jobs,
        ));
    }

    //Return payload for Character Form
    return response()->json($response);
});

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
