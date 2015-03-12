@extends('layouts.master')

@section('content')
    <h1 class="center">The Newlywed Game</h1>
    <h3 class="center">Who are you?</h3>

    <ul class="list-unstyled">
    @foreach( $users as $user )
        <li class="center"><a href="/l/{{ $user->id }}">{{ $user->name }}</a></li>
    @endforeach
    </ul>
@stop