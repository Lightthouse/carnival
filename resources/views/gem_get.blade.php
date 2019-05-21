@extends('layout')
@section('title', 'gems')

@section('content')
    <ul>
        @foreach($gems as $gem)
            <li>{{$gem->parameter->name}}</li>
        @endforeach
    </ul>
@endsection
