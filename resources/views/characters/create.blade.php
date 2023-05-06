@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/characters">
        @csrf
        <input type="text" name="name">
        <select name="server" id="server" class="form-control">
            @foreach($servers as $serv)
                <option value="{{$serv->id}}">{{$serv->name}}</option>
            @endforeach
        </select>
    </form>
</div>
@endsection