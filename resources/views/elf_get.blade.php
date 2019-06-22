@extends('elf_layout')
@section('title','эльф')

@section('content')
    @empty($elf)
        <h1>нет эльфов с данным id</h1>
        @else
            @if($change_opportunity == 'elf')
                <form method="post">
                    <label>
                        <b>Назначенные</b>
                        <ul>
                            @foreach ($unconfirmed_gems as $gem)
                                <li>
                                    <input type="checkbox" name="{{$gem->id}}">
                                    <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                                    {{$gem->parameter->name}}
                                    {{$gem->created_at}}
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-success" name="confirm_form">подтвердить</button>
                    </label>
                </form>
                <label>
                    <b>Полученные</b>
                    <ul >
                        @foreach (mined_gems($confirmed_gems) as $gem)
                            <li>
                                <b>x{{$gem['count']}}</b>
                                <img src="{{$gem['gem_img']}}" alt="gem" class="gem-img">
                                {{$gem['gem_name']}}
                            </li>
                        @endforeach
                    </ul>
                </label>
                <form method="post">
                    <label>
                        <b>@if($preferences_sum_error){{$preferences_sum_error}}@endif <br></b>
                        <b class="prefer_change">Предпочтения</b>
                        <ul class="prefer_list">
                            @foreach ($preferences as $pref)
                                <li>
                                    <img src="{{$pref->parameter->img}}" alt="gem" class="gem-img">
                                    <span class="gems_names">{{$pref->parameter->name}}</span> -
                                    <span class="prefer_value">{{$pref->prefer}}</span>%
                                </li>
                            @endforeach
                        </ul>
                        <button type="button" class="prefer_change btn btn-info">изменить</button>
                        <button type="submit" class=" btn btn-success" name="prefer_form">сохранить</button>
                    </label>
                </form>
            @else
                    <label>
                        <b>Назначенные</b>
                        <ul>
                            @foreach ($unconfirmed_gems as $gem)
                                <li>
                                    <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                                    {{$gem->parameter->name}}
                                    {{$gem->created_at}}
                                </li>
                            @endforeach
                        </ul>
                    </label>
                <label>
                    <b>Полученные</b>
                    <ul >
                        @foreach (mined_gems($confirmed_gems) as $gem)
                            <li>
                                <b>x{{$gem['count']}}</b>
                                <img src="{{$gem['gem_img']}}" alt="gem" class="gem-img">
                                {{$gem['gem_name']}}
                            </li>
                        @endforeach
                    </ul>
                </label>
                    <label>
                        <b>@if($preferences_sum_error){{$preferences_sum_error}}@endif <br></b>
                        <b class="prefer_change">Предпочтения</b>
                        <ul class="prefer_list">
                            @foreach ($preferences as $pref)
                                <li>
                                    <img src="{{$pref->parameter->img}}" alt="gem" class="gem-img">
                                    <span class="gems_names">{{$pref->parameter->name}}</span> -
                                    <span class="prefer_value">{{$pref->prefer}}</span>%
                                </li>
                            @endforeach
                        </ul>
                    </label>

            @endif

        @endempty
{{--
    <img src="https://cdn3.artstation.com/p/assets/images/images/002/064/903/large/si-woo-kim-elf.jpg?1456764267" alt="elf" class="elf-pict">
--}}
    <img src="https://i.pinimg.com/originals/7f/13/ff/7f13fff5d86168984cfe3433f6bb6eea.jpg" alt="elf" class="elf-pict">

    @empty($elf)
        <h1>нет эльфов с данным id</h1>
       @else
        @if($change_opportunity == 'elf' || $change_opportunity == 'master_gnome')
            <fieldset>
                @if($errors->has('email'))
                    <ul>
                        @foreach($errors->get('email') as $mess)
                            <li><b>{{$mess}}</b></li>
                        @endforeach
                    </ul>
                @endif
                <form method="post">
                    <span class="marker-text">Эльф</span>
                    <input type="text" class="hide_element change_input" value="{{$elf->name}}" name="fullName">
                    <span class="change_span">{{$elf->name}}</span>
                    <hr>
                    <input type="text" class="hide_element change_input"  value="{{$elf->email}}" name="email">
                    <span class="change_span">{{$elf->email}}</span>
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
                    <button type="button" class="btn btn-info change_button">изменить</button>
                    <button type="submit" class="btn btn-success save_button" disabled name="settings_form">применить</button>
                </form>
            </fieldset>
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
        @endif

    @endempty

@endsection
