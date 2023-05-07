@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/entries">
        @csrf
        <h3>Title</h3>
        <input type="text" id="title" name="title" class="form-control" placeholder="Title of entry">
        <br>
        
        <h3>Character</h3>
        <select id="character_id" name="character_id" class="form-control">
            @foreach($characters as $char)
                <option value="{{$char->id}}">{{$char->name}}</option>
            @endforeach
        </select>
        <br>

        <h3>Session Time</h3>
        <div class="col-lg-6 col-md-6" style="float:left">
            <input id="start" name="start" type="datetime-local">
        </div>
        <div class="col-lg-6 col-md-6" style="float:left">
            <input id="end" name="end" type="datetime-local">       
        </div>
        <br><br>

        <h3>Body</h3>
        <textarea name="body" id="body" class="form-control" placeholder="Describe your play session" cols="30" rows="10"></textarea>
        <br>

        <button disabled="disabled" class="btn btn-secondary">Import ACT logs (Unavailable)</button>

        <button type="submit" class="btn btn-primary" style="float:right">
            {{ __('Save') }}
        </button>
    </form>

    @if(count($errors))
        <div class="alert alert-dnager">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
@endsection