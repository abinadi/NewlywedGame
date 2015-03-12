@extends('layouts.master')

@section('content')
    <h1>Reconcile question {{ $question->id }}</h1>

    <div class="col-xs-12 col-sm-6">
        <small>Husband's Question</small>
        <h4 class="text-primary">{{ $question->for_husband }}</h4>
    </div>

    <div class="col-xs-12 col-sm-6">
        <small>Wife's Question</small>
        <h4 class="text-success">{{ $question->for_wife }}</h4>
    </div>

    <form method="post" action="/reconcile">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="question_id" value="{{ $question->id }}">

    <table class="table table-striped">
    <thead>
        <th>Husband</th>
        <th>His Answer</th>
        <th>Her Answer</th>
        <th>Wife</th>
        <th>Match</th>
    </thead>
    <tbody>
    @foreach($husbands as $husband)
        <tr>
            <td>{{ $husband->name }}</td>
            @if( count($husband->answers) > 0 )
            <td>{{ $husband->answers[0]->answer }}</td>
            @else
                <td>N/A</td>
            @endif
            <?php
                $wife_answer = \Newlywedgame\Answer::where('user_id',$husband->spouse->id)->where('question_id',$question->id)->first();
                if( ! empty($wife_answer) ) {
                    $wife_answer = $wife_answer->answer;
                } else {
                    $wife_answer = 'N/A';
                }

                if( count($husband->answers) > 0 && $husband->answers[0]->answer == $wife_answer ) {
                    $selected = 'checked="checked"';
                } else {
                    $selected = '';
                }
            ?>
            <td>{{ $wife_answer }}</td>
            <td>{{ $husband->spouse->name }}</td>
            <td>
                <label for="match_{{ $husband->id }}">Yes</label>
                <input type="radio" id="match_{{ $husband->id }}" name="{{ $husband->id }}" value="1" <?php echo $selected; ?>>
                &nbsp;|&nbsp;
                <label for="nomatch_{{ $husband->id }}">No</label>
                <input type="radio" id="nomatch_{{ $husband->id }}" name="{{ $husband->id }}" value="0">
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    <input type="submit" value="Next question" class="btn btn-primary">
    </form>
@stop