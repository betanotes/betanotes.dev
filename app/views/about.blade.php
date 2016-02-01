@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row aboutUs">
            <div class="alignTitle">
                <h1 class="text-center">This Website Was Created By:</h1>
            </div>
            <div class"col-md-4">
                <div class="aboutPage">
                    <img src="/img/longhair.jpg" class="profilepic img-inline img-responsive">
                    <h3 class="text-center"><a class="nameColor" href="https://zeshansegal.com" target="_blank">Zeshan N. Segal</a></h3>
                </div>     
                <div class="aboutPage">
                    <img src="/img/vote.gif" class="profilepic img-inline img-responsive">
                    <h3 class="text-center"><a class="nameColor" href="https://anthony-burns.com" target="_blank">Anthony Burns</a></h3>
                </div>
                <div class="aboutPage">
                    <img src="/img/vote.gif" class="profilepic img-inline img-responsive">
                     <h3 class="text-center"><a class="nameColor" href="https://github.com/Rwilkins1" target="_blank">Reagan Wilkens</a></h3>
                </div>
            </div>
        </div><!-- End of Row-->    
    </div><!-- End of container-->  

@stop
{{-- end of content  --}}