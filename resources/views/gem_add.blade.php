@extends('layout')
@section('title','добавление камней')

@section('content')
    <h2>Добавление камней</h2>
    <form action="" class="gem-form">
        <ul class="gem-list">
            @foreach($gems as $gem)
                <li>
                    <img src="{{$gem->img}}" alt="gem" class="gem-img">
                    {{$gem->name}}
                </li>
                <input type="text" placeholder="добыто">
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary">добавить камни</button>
    </form>
@endsection
