@extends('layout')
@section('title', 'gems')

@section('content')
    <ul>
        @foreach($gems as $gem)
            <li><img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">{{$gem->parameter->name}}</li>
        @endforeach
    </ul>
@endsection
