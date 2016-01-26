@extends('layouts.master')

@section('content')

<div class="container fourohfourmargins">
    <div class="row">

    	<div class="col-md-12 text-center">
            <h1 class="lostnotey">?!</h1>
            <img src="/img/fourohfour.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            <h4>Ut-oh! You seem to have lost your way. That's okay, Notey's lost too.</h4>
            <p>Here are some pages to visit instead:</p>
            <a href="{{{ action('FeedController@showMain') }}}" class="btn btn-standard" role="button">Public Feed</a>
            <a href="{{{ action('HomeController@dashboard') }}}" class="btn btn-create" role="button">Your Dashboard</a>
        </div> <!-- end col-md-9 -->

    </div> <!-- end row -->
</div> <!-- end container -->

@stop 
{{-- end of content	 --}}