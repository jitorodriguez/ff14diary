<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Servers;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("characters.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servers = Servers::All();
        return view("characters.create", compact("servers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Characters $characters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Characters $characters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Characters $characters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Characters $characters)
    {
        //
    }
}
