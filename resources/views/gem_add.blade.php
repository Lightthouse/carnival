@extends('layout')
@section('title','добавление камней')

@section('content')

    <form method="post">
        <h2>Добавление камней</h2>
        @if($add_success)
            <b>камни успешно добалены!</b>
            <img src="http://www.iconarchive.com/download/i45921/tatice/cristal-intense/ok.ico" alt="success" class="gem-img">
        @endif
        <div class="gem-form">
            <ul class="gem-list">
                @foreach($gems as $gem)
                    <li>
                        <img src="{{$gem->img}}" alt="gem" class="gem-img">
                        {{$gem->name}}
                    </li>
                    <input type="number" placeholder="добыто" name="{{$gem->id}}">
                @endforeach
            </ul>
            <button type="submit" class="btn btn-primary">добавить камни</button>
        </div>
    </form>
@endsection
