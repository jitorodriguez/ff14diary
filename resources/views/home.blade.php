@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Entries') }}</div>

                <div class="card-body">
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
                    @else
                        <div>
                            <a href="/entries/create">Add a entry</a>
                        </div>
                    @endif
                </div>
            </div>

            <br>

            <h3>Your Entries</h3>
            @if($user->entries->count())
                @foreach($user->entries as $entry)
                @endforeach
            @else
                <p>No posts found. <a href="/entries/create">Add a entry?</a></p>
            @endif
        </div>
    </div>
</div>
@endsection
