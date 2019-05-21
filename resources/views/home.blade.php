@extends('layout')

@section('content')

    <img src="https://i.pinimg.com/564x/3f/c8/42/3fc842a8fd73de2394a89879925f45eb.jpg" alt="gnome" class="people-list">
    <label >
        <b>Gnomes</b>
{{--
        <img src="https://i.pinimg.com/236x/4b/ba/47/4bba477b45a9fb0a3f79513354b06ab1.jpg" alt="gnome" class="people-list">
--}}
        <ul>
            @foreach($gnomes as $gnome)
                <li>{{$gnome->name}}</li>
            @endforeach
        </ul>
    </label>

    <img src="https://i.pinimg.com/564x/8b/02/3e/8b023efa92bda33a5e7b1113c47d681a.jpg" alt="elf" class="people-list">
    <label>
        <b>Elves</b>
{{--
        <img src="https://i.pinimg.com/564x/74/13/f5/7413f5d01e20588baa2d2ad2f7466bc1.jpg" alt="elf" class="people-list">
--}}
        <ul>
            @foreach($elves as $elf)
                <li>{{$elf->name}}</li>
            @endforeach
        </ul>
    </label>


@endSection
