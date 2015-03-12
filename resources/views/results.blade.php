@extends('layouts.master')

@section('content')
    <h1>Results</h1>

    <table class="table table-striped">
    <thead>
        <th>Couple</th>
        <th>Score</th>
    </thead>
    <tbody>
        @foreach($hids as $hid)
            <?php
                $husband = \Newlywedgame\User::with('spouse')->where('id',$hid->husband_id)->first();
            ?>
            <tr>
                <td>{{ $husband->name }} &amp; {{ $husband->spouse->name }}</td>
                <td>{{ $hid->total_matches }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
@stop