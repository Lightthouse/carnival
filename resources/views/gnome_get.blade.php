@extends('gnome_layout');
@section('title')
    gnomes
@endSection

@section('content')
    <img src="https://i.pinimg.com/originals/76/20/eb/7620eb8a9e83d6d059430191b9e0c044.jpg" alt="gnom" class="gnome-pict">
    @empty($gnome)
        <h1>there are no gnomes with this id</h1>
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
