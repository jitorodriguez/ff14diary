@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/characters">
        @csrf

        {{-- Character section --}}
        <h3>Character Name</h3>
        <input type="text" name="name" class="form-control" placeholder="Enter Characters Name">
        {{-- End of Character section --}}

        <br>

        {{-- Server section --}}
        <h3>Server</h3>
        <select name="serverid" id="serverid" class="form-control">
            @foreach($servers as $serv)
                <option value="{{$serv->id}}">{{$serv->region}} - {{$serv->datacenter}} - {{$serv->name}}</option>
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
                    <input type="checkbox" id="{{$tank->name}}" name="{{$tank->name}}">
                    <label for="{{$tank->name}}">{{$tank->name}}</label>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-6">
                <h5>Healers</h5>
                @foreach($healers as $healer)
                <div class='col-lg-12 col-md-12'>
                    <input type="checkbox" id="{{$healer->name}}" name="{{$healer->name}}">
                    <label for="{{$healer->name}}">{{$healer->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row" style="padding-top:10px">
            <div class="col-lg-12 col-md-12">
                <h5>DPS</h5>
                @foreach($dpses as $dps)
                    <div style="float:left">
                        <input type="checkbox" id="{{$dps->name}}" name="{{$dps->name}}">
                        <label for="{{$dps->name}}" style="padding-right: 20px;">{{$dps->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End of Jobs section --}}

        <br>

        {{-- Submit section --}}
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
        {{-- End of Submit section --}}
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