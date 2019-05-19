@extends('layout')

@section('content')
    @empty($user)
        <p>Пользователя не существует</p>
        @else

        <h1>{{$user->firstName}}
            {{$user->lastName}}
        </h1>

    @endempty
@endsection
