@extends('layouts.app')

@section('content')
    <characters-component :characters="{{json_encode($characters)}}"/>
@endsection