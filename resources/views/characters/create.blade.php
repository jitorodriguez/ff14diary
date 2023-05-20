@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- {{isset($character) ? var_dump($character->jobs) : "no character" }} -->
<character-form 
    :servers="{{ json_encode($servers) }}" 
    :tanks="{{ json_encode($tanks)}}" 
    :healers="{{ json_encode($healers) }}" 
    :dpses="{{ json_encode($dpses) }}"

    :new-mode="{{ json_encode(!isset($character)) }}"
    :characterid="{{ isset($character) ? $character->id : old('name')}}"
    :name="{{ isset($character) ? json_encode($character->name) : old('name') }}"
    :serverid="{{ isset($character) ? json_encode($character->server) : old('serverid') }}"
    :jobs="{{isset($character) ? json_encode($character->jobs) : json_encode([])}}"

    :errors="{{ json_encode($errors)}}"
>
@endsection