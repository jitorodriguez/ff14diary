@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<entry-form 
    {{-- Form Data for selection --}}
    :characters="{{ json_encode($characters) }}"

    {{-- Form values --}}
    :entryid="{{ isset($entry) ? json_encode($entry->id) : '' }}"
    :title="{{ isset($entry) ? json_encode($entry->title) : json_encode(old('title')) }}"
    :characterid="{{ isset($entry) ? json_encode($entry->character_id) : json_encode(old('character_id'))}}"
    :start="{{ isset($entry) ? json_encode($entry->start) : json_encode(old('start')) }}"
    :end="{{ isset($entry) ? json_encode($entry->end) : json_encode(old('end')) }}"
    :body="{{ isset($entry) ? json_encode($entry->body) : json_encode(old('body')) }}"

    {{-- Form states  --}}
    :new-mode="{{ json_encode(!isset($entry)) }}"
    :errors="{{ json_encode($errors->all())}}"
>

@endsection