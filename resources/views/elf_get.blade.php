@extends('elf_layout')
@section('title','эльф')

@section('content')
    <label>
        <b>Предпочтения</b>
        <ul>
            @foreach ($elf->parameters as $pref)
                <li>
                    <img src="{{$pref->img}}" alt="gem" class="gem-img">
                    {{$pref->name}}
                </li>
            @endforeach
        </ul>
    </label>

{{--
    <img src="https://cdn3.artstation.com/p/assets/images/images/002/064/903/large/si-woo-kim-elf.jpg?1456764267" alt="elf" class="elf-pict">
--}}
    <img src="https://i.pinimg.com/originals/7f/13/ff/7f13fff5d86168984cfe3433f6bb6eea.jpg" alt="elf" class="elf-pict">

    @empty($elf)
        <h1>нет эльфов с данным id</h1>
       @else
        <fieldset>
            <span class="marker-text">Эльф</span>
            {{$elf->name}}
            <hr>
            <span class="marker-text">Email</span>
            {{$elf->email}}
            <hr>
            <span class="marker-text">Пароль</span>
            {{$elf->password}}
            <hr>
            <span class="marker-text">Дата регистрации</span>
            {{$elf->created_at}}
        </fieldset>
    @endempty

@endsection
