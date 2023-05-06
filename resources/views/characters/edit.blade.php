@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit:</h2>
    <form method="post" action="/characters/{{$character->id}}">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <h3>Character Name</h3>
        <input type="text" name="name" value="{{$character->name}}"class="form-control" placeholder="Enter Characters Name">
        <br>

        <h3>Server</h3>
        <select name="serverid" id="serverid" value="{{$character->server}}" class="form-control">
            @foreach($servers as $serv)
                <option value="{{$serv->id}}"
                @if($serv->id === $character->server)
                    selected="selected"
                @endif
                >{{$serv->region}} - {{$serv->datacenter}} - {{$serv->name}}</option>
            @endforeach
        </select>
        <br>

        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>

    </form>

    <br>

    <form method="post" action="/characters/{{$character->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="Delete" value="Delete" class="btn btn-danger">
    </form>

    <br>

    

</div>
@endsection