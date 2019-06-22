@extends('gnome_layout')
@section('title','гном')

@section('content')
    @empty($gnome)
        <h1>нет гномов с данным id</h1>
    @else
        <label>
            <b>Добытые камни</b>
            <ul>
                @foreach (mined_gems($gnome->gems) as $gem)
                    <li>
                        <b>x{{$gem['count']}}</b>
                        <img src="{{$gem['gem_img']}}" alt="gem" class="gem-img">
                        {{$gem['gem_name']}}
                    </li>
                @endforeach
            </ul>
        </label>
    @endempty

    <img src="https://i.pinimg.com/originals/76/20/eb/7620eb8a9e83d6d059430191b9e0c044.jpg" alt="gnome" class="gnome-pict">
    @empty($gnome)
        <h1>нет гномов с данным id</h1>
        @else
            @if($change_opportunity)
                <fieldset>
                    @if($errors->has('email'))
                        <ul>
                            @foreach($errors->get('email') as $mess)
                                <li><b>{{$mess}}</b></li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="post">
                        <span class="marker-text">Гном</span>
                        <input type="text" class="hide_element change_input" value="{{$gnome->name}}" name="fullName">
                        <span class="change_span">{{$gnome->name}}</span>
                        <hr>
                        <span class="marker-text">Email</span>
                        <input type="text" class="hide_element change_input"  value="{{$gnome->email}}" name="email">
                        <span class="change_span">{{$gnome->email}}</span>
                        <hr>
                        <span class="marker-text">Дата регистрации</span>
                        {{$gnome->created_at}}
                        <hr>
                        <span class="marker-text">Статус в системе</span>
                        @isset($gnome->deleted_at)
                            <span class="text-danger">Удален {{$gnome->deleted_at}}</span>
                        @else
                            <span class="text-success">Активен {{$gnome->deleted_at}}</span>
                        @endisset
                        <hr>
                        <label>
                         <b>Мастер Гном</b>
                            @if($gnome->master_gnome)
                                <input class="checkbox" type="checkbox" name="master-check" disabled checked>
                            @else
                                <input class="checkbox" type="checkbox" name="master-check" disabled>
                            @endif
                        </label>
                        <button type="button" class="btn btn-info change_button">изменить</button>
                        <button type="submit" class="btn btn-success save_button" disabled>применить</button>
                    </form>
                </fieldset>
            @else
                <fieldset>
                    <span class="marker-text">Гном</span>
                    {{$gnome->name}}
                    <hr>
                    <span class="marker-text">Email</span>
                    {{$gnome->email}}
                    <hr>
                    <span class="marker-text">Дата регистрации</span>
                    {{$gnome->created_at}}
                    <hr>
                    <span class="marker-text">Статус в системе</span>
                    @isset($gnome->deleted_at)
                        <span class="text-danger">Удален {{$gnome->deleted_at}}</span>
                    @else
                        <span class="text-success">Активен {{$gnome->deleted_at}}</span>
                    @endisset
                    <hr>
                    <label>
                        <b>Мастер Гном</b>
                        @if($gnome->master_gnome)
                            <input class="checkbox" type="checkbox" name="master-check" disabled checked>
                        @else
                            <input class="checkbox" type="checkbox" name="master-check" disabled>
                        @endif
                    </label>
                </fieldset>
            @endif

    @endempty
@endSection
