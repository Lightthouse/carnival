@extends('layout')
@section('title', 'gems')

@section('content')

    <form method="post" class="hide_element filter_form">
        <label class="filter_label">
            назначены указанному эльфу
            <select name="filter_elf">
                <option value="">выберите строку</option>
                @foreach($elves as $elf)
                    <option value="{{$elf->id}}">{{$elf->name}}</option>
                @endforeach
            </select>
        </label>
        <label class="filter_label">
            добыты указанным гномом
            <select name="filter_gnome">
                <option value="">выберите строку</option>
                @foreach($gnomes as $gnome)
                    <option value="{{$gnome->id}}">{{$gnome->name}}</option>
                @endforeach
            </select>
        </label>
        <label class="filter_label">
            соответствуют указанному типу
            <select name="filter_parameter">
                <option value="">выберите строку</option>
                @foreach($parameters as $parameter)
                    <option value="{{$parameter->id}}">{{$parameter->name}}</option>
                @endforeach
            </select>
        </label>
{{--        <label class="filter_label">
            распределены указанным Мастер Гномом
            <select name="filter_gnome">
                @foreach($gnomes as $gnome)
                    <option value="{{$gnome->id}}">{{$gnome->name}}</option>
                @endforeach
            </select>
        </label>
        <label class="filter_label">
            дата назначения которых произошла раньше и/или позже указанной даты <input type="text" class="filter_input" name="filter_date_distribute">
        </label>
        <label class="filter_label">
            дата подтверждения передачи которых произошла раньше и/или позже указанной даты <input type="text" class="filter_input" name="filter_date_confirm">
        </label>--}}
        <button type="submit" class="btn btn-success filter_commit">применить</button>
    </form>
    <button type="button" class="btn btn-primary filter_button">фильтр</button>
    <label class="scroll_gem">
        <b>Добытые камни</b>
        <ul>
            @foreach ($gems as $gem)
                <li class="gem_li">
                    <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                    <b>{{$gem->parameter->name}}</b>
                    {{$gem->gnome->name}}
                    @isset($gem->elf->name){{$gem->elf->name}}@else <b>нет эльфа</b> @endisset
                    @isset($gem->confirmed_at ) подтвержден@else не подтвержден @endisset
                    <b>{{$gem->created_at}}</b>
                </li>
            @endforeach
        </ul>
    </label>

@endsection

@section('javascript')
    <script src="/js/gem_get.js"></script>
@endsection
