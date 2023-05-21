@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<character-form
    {{-- Form Data for selection --}}
    :servers="{{ json_encode($servers) }}"
    :jobs="{{ json_encode($jobs) }}"

    {{-- Form values --}}
    :characterid="{{ isset($character) ? $character->id : old('name')}}"
    :name="{{ isset($character) ? json_encode($character->name) : old('name') }}"
    :serverid="{{ isset($character) ? json_encode($character->server) : old('serverid') }}"
    :active-jobs="{{isset($character) ? json_encode($character->jobs) : json_encode([])}}"

    {{-- Form states  --}}
    :new-mode="{{ json_encode(!isset($character)) }}"
    :errors="{{ json_encode($errors->all())}}"
>
@endsection