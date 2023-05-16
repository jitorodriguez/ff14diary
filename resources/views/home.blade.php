@extends('layouts.app')

@section('content')
<!-- [{"title" => "first title"} , {"title" => "first title"}] -->
<!-- $user->entries->all() -->
    <home-component 
        name="{{$user->name}}" 
        {{$user->characters->count() ? ':has-character="true"' : ''}} 
        :entries="{{ json_encode($user->entries->all()) }}" 
    />
@endsection
