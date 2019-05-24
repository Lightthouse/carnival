@extends('gnome_layout')
@section('title','гном')

@section('content')
    <label>
        <b>Добытые камни</b>
        <ul>
            @foreach (gnome_gems($gnome) as $gem)
                <li>
                    <b>x{{$gem['count']}}</b>
                    <img src="{{$gem['gem_img']}}" alt="gem" class="gem-img">
                    {{$gem['gem_name']}}
                </li>
            @endforeach
        </ul>
    </label>

    <img src="https://i.pinimg.com/originals/76/20/eb/7620eb8a9e83d6d059430191b9e0c044.jpg" alt="gnome" class="gnome-pict">
    @empty($gnome)
        <h1>нет гномов с данным id</h1>
        @else
        <fieldset>
            <span class="marker-text">Гном</span>
            {{$gnome->name}}
            <hr>
            <span class="marker-text">Email</span>
            {{$gnome->email}}
            <hr>
            <span class="marker-text">Пароль</span>
            {{$gnome->password}}
            <hr>
            <span class="marker-text">Дата регистрации</span>
            {{$gnome->created_at}}
        </fieldset>

    @endempty
@endSection
