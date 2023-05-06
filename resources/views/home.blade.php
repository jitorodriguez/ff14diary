@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notice Center') }}</div>

                <div class="card-body" style="background: antiquewhite">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome')}} {{$user->name}}!

                    @if(!$user->characters->count())
                        <div>
                            <p>No characters found, <a href="/characters/create">register a character</a>?</p>
                        </div>
                    @endif
                </div>
            </div>

            <br>

            {{-- Entries section - To be moved to seperate view --}}
            <div>
                <div class="col-md-12" style="display: flex; justify-content: left; position:relative; margin-bottom: 10px">
                    <h3>Your Entries</h3>
                    @if($user->characters->count())
                        <a href="/entries/create" style="position:absolute; right: 0px;"><button class="btn btn-primary">Add</button></a>
                    @endif
                </div>
                @if($user->entries->count())
                    @foreach($user->entries as $entry)
                    <div class="card">
                        <div class="card-header">{{$entry->title}}</div>
                        <div class="card-body">
                            <p>Character: {{$entry->character->name}}</p>
                            <p>{{$entry->body}}</p>
                            <a style="float:right"href="entries/{{$entry->id}}/edit ">Edit</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    @if(!$user->characters->count())
                        <p>Create character before creating entries</p>
                    @else
                        <p>No entries found.</p>
                    @endif
                @endif
            </div>
            {{-- End of Entries section --}}
        </div>
    </div>
</div>
@endsection
