@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit:</h2>
    <form method="post" action="/characters/{{$character->id}}">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        {{-- Character section --}}
        <h3>Character Name</h3>
        <input type="text" name="name" value="{{$character->name}}"class="form-control" placeholder="Enter Characters Name">
        {{-- End of Character section --}}

        <br>

        {{-- Server section --}}
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
        {{-- End of Server section --}}

        {{-- Jobs section --}}
        <h3>Jobs</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h5>Tanks</h5>
                @foreach($tanks as $tank)
                <div class='col-lg-12 col-md-12'>
                    <input type="checkbox" id="{{$tank->shortname}}" name="{{$tank->shortname}}"
                    @if($character->jobs->contains($tank->id))
                        checked
                    @endif
                    >
                    <label for="{{$tank->shortname}}">{{$tank->name}}</label>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-6">
                <h5>Healers</h5>
                @foreach($healers as $healer)
                <div class='col-lg-12 col-md-12'>
                    <input type="checkbox" id="{{$healer->shortname}}" name="{{$healer->shortname}}"
                    @if($character->jobs->contains($healer->id))
                        checked
                    @endif
                    >
                    <label for="{{$healer->shortname}}">{{$healer->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row" style="padding-top:10px">
            <div class="col-lg-12 col-md-12">
                <h5>DPS</h5>
                @foreach($dpses as $dps)
                    <div style="float:left">
                        <input type="checkbox" id="{{$dps->shortname}}" name="{{$dps->shortname}}"
                        @if($character->jobs->contains($dps->id))
                            checked
                        @endif
                        >
                        <label for="{{$dps->shortname}}" style="padding-right: 20px;">{{$dps->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End of Jobs section --}}

        <br>

        {{-- Submit section --}}
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
        {{-- End of Submit section --}}

    </form>

    <br>

    <form method="post" action="/characters/{{$character->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="Delete" value="Delete" class="btn btn-danger">
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

    <br>

    

</div>
@endsection