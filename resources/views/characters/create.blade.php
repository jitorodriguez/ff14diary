@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/characters">
        @csrf
        <h3>Character Name</h3>
        <input type="text" name="name" class="form-control" placeholder="Enter Characters Name">
        <h3>Server</h3>
        <select name="serverid" id="serverid" class="form-control">
            @foreach($servers as $serv)
                <option value="{{$serv->id}}">{{$serv->region}} - {{$serv->datacenter}} - {{$serv->name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </form>
</div>
@endsection