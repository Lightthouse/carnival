@extends('elf_layout')
@section('title','эльф')

@section('content')
    @empty($elf)
        <h1>нет эльфов с данным id</h1>
        @else
            <label>
                <b>Полученные</b>
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
            <label>
                <b>Предпочтения</b>
                <ul>
                    @foreach ($preferences as $pref)
                        <li>
                            <img src="{{$pref->parameter->img}}" alt="gem" class="gem-img">
                            {{$pref->parameter->name}} - {{$pref->prefer}}%
                        </li>
                    @endforeach
                </ul>
            </label>

        @endempty

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
            <span class="marker-text">Дата регистрации</span>
            {{$elf->created_at}}
            <hr>
            <span class="marker-text">Статус в системе</span>
            @isset($elf->deleted_at)
                <span class="text-danger">Удален {{$elf->deleted_at}}</span>
            @else
                <span class="text-success">Активен </span>
            @endisset
        </fieldset>
    @endempty

@endsection
