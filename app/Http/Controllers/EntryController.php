<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\EntryRequest;

class EntryController extends Controller
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
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $characters = $user->characters;
        return view('entries.form', compact('characters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntryRequest $request)
    {
        $user = Auth::user();
        $entry = new Entry();

        $entry->user_id = $user->id;
        $entry->character_id = $request->character_id;
        $entry->title = $request->title;
        $entry->body = $request->body;
        $entry->start = $request->start;
        $entry->end = $request->end;

        $entry->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        $user = Auth::user();
        $characters = $user->characters;
        return view('entries.form', compact('entry', 'characters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntryRequest $request, Entry $entry)
    {
        $user = Auth::user();

        $entry->user_id = $user->id;
        $entry->character_id = $request->character_id;
        $entry->title = $request->title;
        $entry->body = $request->body;
        $entry->start = $request->start;
        $entry->end = $request->end;

        $entry->update();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect('/home');
    }
}
