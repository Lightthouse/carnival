@extends('layout')
@section('title','нераспределенные камни')

@section('content')
    <label>
        <h2>Распределение драгоценностей</h2>
        <form >
            <ul>
                @foreach($gems as $gem)
                    <li>
                        <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                        {{$gem->parameter->name}}
                        <b>{{$gem->gnome->name}}</b>
                        {{$gem->created_at}}
                    </li>
                @endforeach
            </ul>
            <button type="submit" class="btn btn-primary">распределить</button>
        </form>
    </label>

@endsection
