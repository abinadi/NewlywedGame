@extends('layouts.master')

@section('content')
    @if( Session::has('message') )
        <div class="alert alert-success alert-dismissible" id="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif

    <h1>Submit a question</h1>

    <form role="form" method="post" action="/question">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group col-xs-12 col-sm-6">
            <label for="for_husband">For Husband</label>
            <input type="text" id="for_husband" name="for_husband" class="form-control">
            <small><em>Ex. What is your favorite color?</em></small>
        </div>

        <div class="form-group col-xs-12 col-sm-6">
            <label for="for_wife">For Wife</label>
            <input type="text" id="for_wife" name="for_wife" class="form-control">
            <small><em>Ex. What is your husband's favorite color?</em></small>
        </div>

        <input type="submit" value="Submit your question" class="btn btn-primary">
    </form>

@stop

@section('js-footer')
    <script type="text/javascript">
        $('#alert').fadeTo(7000,500).slideUp(500, function() {
            $('#alert').alert('close');
        });
    </script>
@stop