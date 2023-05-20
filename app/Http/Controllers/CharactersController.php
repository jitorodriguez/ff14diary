<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Character;
use App\Models\Server;
use App\Models\Job;

//Requests
use App\Http\Requests\CharacterRequest;


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
        $tanks = Job::where(['role' => "Tank"])->get();
        $healers = Job::where(['role' => "Healer"])->get();
        $dpses = Job::where(['role' => "DPS"])->get();

        return view("characters.create", compact("servers", "tanks", "healers", "dpses"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        //Initialize and declare user, list of jobs, and new character
        $user = Auth::user();
        $jobs = Job::All();
        $character = new Character();

        //Save character
        $character->user_id = $user->id;
        $character->name = $request->name;
        $character->server = $request->serverid;
        $character->save();
        
        //Attach jobs to character
        foreach($jobs as $job)
        {
            if(isset($request[$job->shortname]))
            {
                $character->jobs()->save($job);
            }
        }

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
        $tanks = Job::where(['role' => "Tank"])->get();
        $healers = Job::where(['role' => "Healer"])->get();
        $dpses = Job::where(['role' => "DPS"])->get();

        return view('characters.create', compact('character', 'servers', 'tanks', 'healers', 'dpses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $character->name = $request->name;
        $character->server = $request->serverid;
        $character->update();

        //Retrieve all jobs to sync to character
        $jobs = Job::All();
        foreach($jobs as $job)
        {
            if(isset($request[$job->shortname]))
                $jobsToAssign[] = $job->id;
        }
        
        $character->jobs()->sync($jobsToAssign);
        return redirect('/characters');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->jobs()->detach();
        $character->delete();
        return redirect('/characters');
    }
}
