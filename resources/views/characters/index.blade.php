@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Characters Listing</h3>
    <ul>
        @foreach($characters as $character)
        <li><a href="characters/{{$character->id}}/edit">{{$character->name}}</a></li>
        @endforeach
    </ul>
    <a href="characters/create">Add a new character</a>
</div>
@endsection