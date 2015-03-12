@extends('layouts.master')

@section('content')
    <h1>Question {{ $question->id }} of {{ $total }}</h1>

    <p class="question">
    @if( Auth::user()->gender == 'male' )
        {{ $question->for_husband }}
    @else
        {{ $question->for_wife }}
    @endif
    </p>

    <form role="form" method="post" action="/answer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="question_id" value="{{ $question->id }}">

        <div class="form-group">
            @if( empty($answer) )
                <textarea id="answer" name="answer" class="form-control"></textarea>
            @else
                <input type="hidden" name="_method" value="PUT">
                <textarea id="answer" name="answer" class="form-control">{{ $answer->answer }}</textarea>
            @endif
        </div>

        <input type="submit" value="Next" class="btn btn-info">
    </form>

    <nav>
        <p><small class="text-muted">Jump to question:</small></p>

        <ul class="pagination">
        @foreach( $questions as $q )
            @if( $q->id == $question->id )
                <li class="active">
            @else
                <li>
            @endif
            <a href="/question/{{ $q->id }}">{{ $q->id }}</a></li>
        @endforeach
        </ul>
    </nav>
@stop