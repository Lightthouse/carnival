@extends('layout')
@section('title','нераспределенные камни')

@section('content')
    <label>
        <h2>Нераспределенные драгоценностей</h2>
        <b>@if($post_request_error){{$post_request_error}}@endif</b>
        <form method="post">
            <div class="form_distribution">
                <div class="distribution_parameters">
                    <span>наибольшее предпочтени, %</span><input type="number" disabled value="0" name="distribute_preference">
                    <span>недельная радость, %</span><input type="number" disabled value="0" name="distribute_mood">
                    <span>равное количество, %</span><input type="number" disabled value="0" name="distribute_count">
                </div>
                <ul>
                    @foreach($gems_no_elf as $gem)
                        <li>
                            <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                            {{$gem->parameter->name}}
                            <b>{{$gem->gnome->name}}</b>
                            {{$gem->created_at}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn btn-info change_distribution_button" >изменить</button>
            <button type="submit" class="btn btn-success commit_distribution_button" name="distribute_form" disabled>распределить</button>
        </form>
    </label>
    <label>
        <h2>Неподтвержденные драгоценностей</h2>
        <form method="post">
            <ul >
                @foreach($gems_no_confirm as $gem)
                    <li>
                        <img src="{{$gem->parameter->img}}" alt="gem" class="gem-img">
                        {{$gem->parameter->name}}
                        <b>{{$gem->elf->name}}</b>
                        {{$gem->created_at}}

                        <select class="hide_element" name="{{$gem->id}}">
                            <option value="">выберите эльфа</option>
                            @foreach($elves as $elf)
                                <option value="{{$elf->id}}" >{{$elf->name}}</option>
                            @endforeach
                        </select>
                    </li>
                @endforeach
            </ul>
            <button type="button" class="btn btn-info change_elf_button">изменить</button>
            <button type="submit" class="btn btn-success" name="change_elf_form">сохранить</button>
        </form>
    </label>
@endsection

@section('javascript')
    <script src="/js/distribute.js"></script>
@endsection
