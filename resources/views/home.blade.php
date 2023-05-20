@extends('layouts.app')

@section('content')
    <home-component
        name="{{$user->name}}" 
        {{$user->characters->count() ? ':has-character="true"' : ''}} 
        :entries="{{ json_encode($user->entries->all()) }}" 
    />
@endsection
