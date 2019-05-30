@extends('layout')
@section('title', 'gems')

@section('content')
    <label>
        <b>Добытые камни</b>
        <ul>
            @foreach (mined_gems($gems) as $gem)
                <li>
                    <b>x{{$gem['count']}}</b>
                    <img src="{{$gem['gem_img']}}" alt="gem" class="gem-img">
                    {{$gem['gem_name']}}
                </li>
            @endforeach
        </ul>
    </label>
{{--    <ul>
        @foreach($gems as $gem)
            <li><img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">{{$gem->parameter->name}}</li>
        @endforeach
    </ul>--}}

@endsection
