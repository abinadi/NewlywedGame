@extends('layouts.master')

@section('content')
    <h1>Review your answers</h1>

    <table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Your answer</th>
    </thead>
    <tbody>
    @foreach( $questions as $question )
        <tr>
            <td>{{ $question->id }}</td>
            @if( \Auth::user()->gender == 'male' )
                <td>{{ $question->for_husband }}</td>
            @else
                <td>{{ $question->for_wife }}</td>
            @endif
            <td>
                @if( !empty($question->answer[0]) )
                    <a href="/question/{{ $question->id }}">{{ $question->answer[0]->answer }}</a>
                @else
                    <a href="/question/{{ $question->id }}">NO ANSWER</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    @if( $locked )
        <aside class="alert alert-info">
            Answers are locked. You cannot change any of your answers. Good luck.
        </aside>
    @else
        <form role="table" method="post" action="/review">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @if( $status )
                <input type="submit" value="Lock your answers" class="btn btn-warning">
            @else
                <input type="submit" value="Lock your answers (Not all questions are answered.)" class="btn btn-danger">
            @endif
        </form>
    @endif
@stop