@extends('layout')

@section('content')

    <img src="https://i.pinimg.com/564x/3f/c8/42/3fc842a8fd73de2394a89879925f45eb.jpg" alt="gnome" class="people-list">
    <label >
        <b>Гномы</b>
        <ul>
            @foreach($gnomes as $gnome)
                <li>
                    <a href="gnomes/{{$gnome->id}}">
                        @if($gnome->id == $this_gnome)
                            <b>{{$gnome->name}}</b>
                        @else
                            {{$gnome->name}}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </label>

    <img src="https://i.pinimg.com/564x/8b/02/3e/8b023efa92bda33a5e7b1113c47d681a.jpg" alt="elf" class="people-list">
    <label>
        <b>Эльфы</b>
        <ul>
            @foreach($elves as $elf)
                <li>
                    <a href="elves/{{$elf->id}}">
                        @if($elf->id == $this_elf)
                            <b>{{$elf->name}}</b>
                        @else
                            {{$elf->name}}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </label>

@endSection
