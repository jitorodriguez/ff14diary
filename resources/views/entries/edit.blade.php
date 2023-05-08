@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/entries/{{$entry->id}}">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        {{-- Title section --}}
        <h3>Title</h3>
        <input type="text" id="title" name="title" value="{{$entry->title}}" class="form-control" placeholder="Title of entry">
        {{-- End of Title section --}}

        <br>
        
        {{-- Character section --}}
        <h3>Character</h3>
        <select id="character_id" name="character_id" value="{{$entry->character_id}}" class="form-control">
            @foreach($characters as $char)
                <option value="{{$char->id}}"
                @if($entry->character_id === $char->id)
                    selected="selected"
                @endif
                >{{$char->name}}</option>
            @endforeach
        </select>
        {{-- End of Character section --}}

        <br>

        {{-- Session Time section --}}
        <h3>Session Time</h3>
        <div class="col-lg-6 col-md-6" style="float:left">
            <label for="start">Start</label>
            <input id="start" name="start" value="{{$entry->start}}" type="datetime-local">
        </div>
        <div class="col-lg-6 col-md-6" style="float:left">
            <label for="end">End</label>
            <input id="end" name="end" value="{{$entry->end}}" type="datetime-local">       
        </div>
        {{-- End of Session Time section --}}

        <br><br>

        {{-- Entry Body Section --}}
        <h3>Body</h3>
        <textarea name="body" id="body" value="{{$entry->body}}" class="form-control" placeholder="Describe your play session" cols="30" rows="10">{{$entry->body}}</textarea>
        {{-- End of Entry Body Section --}}
        <br>

        {{-- Upload / Save Buttons Section --}}
        <button disabled="disabled" class="btn btn-secondary">Import ACT logs (Unavailable)</button>
        <button type="submit" class="btn btn-primary" style="float:right">
            {{ __('Save') }}
        </button>
        {{-- End of Upload / Save Buttons Section --}}
    
    </form>

    <br>

    {{-- Delete Section --}}
    <form method="post" action="/entries/{{$entry->id}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="Delete" value="Delete" class="btn btn-danger">
    </form>
    {{-- End of Delete Section --}}

    {{-- Error Section --}}
    @if(count($errors))
        <div class="alert alert-dnager">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- End of Error Section --}}

</div>
@endsection