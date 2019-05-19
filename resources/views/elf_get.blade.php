@extends('elf_layout')

@section('content')
    @empty($elves)
        <h1>there are no elves with this id</h1>
       @else
        <h1>
         {{$elves->name}}

        </h1>
    @endempty

@endsection
