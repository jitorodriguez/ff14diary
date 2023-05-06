<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Character;
use App\Models\Server;


class CharactersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $characters = $user->characters;
        return view("characters.index", compact("characters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servers = Server::All();
        return view("characters.create", compact("servers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $character = new Character();

        $character->user_id = $user->id;
        $character->name = $request->name;
        $character->server = $request->serverid;

        $character->save();

        return redirect('/characters');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $servers = Server::all();
        return view('characters.edit', compact('character', 'servers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $character->name = $request->name;
        $character->server = $request->serverid;
        $character->update();
        
        return redirect('/characters');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect('/characters');
    }
}
