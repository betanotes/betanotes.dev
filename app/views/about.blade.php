@extends('layouts.master')

@section('content')

    <div class="container containermargins">
        <div class="row aboutUs">
            <div class="alignTitle">
                <h1 class="text-center">This Website Was Created By:</h1>
            </div>
            <div class="col-md-4 text-center">
                <h3><a class="nameColor" href="http://zeshansegal.com" target="_blank">Zeshan N. Segal</a></h3>
                <div class="forimages">
                    <img src="/img/zeeprofilepic.jpg" class=" zee img-responsive img-inline">  
                </div>
            </div>
            <div class="col-md-4 text-center"> 
                <h3><a class="nameColor" href="http://anthony-burns.com" target="_blank">Anthony Burns</a></h3>
                <div class="forimages">
                    <img src="/img/tony3.jpg" class="tony img-responsive img-inline">
                </div>
            </div> 
            <div class="col-md-4 text-center">
                <h3><a class="nameColor" href="http://reaganwilkins.com" target="_blank">Reagan Wilkins</a></h3>
                <div class="forimages">
                    <img src="/img/reagan1.png" class=" reagan img-responsive img-inline">
                </div>
            </div>
        </div><!-- End of Row-->    
    </div><!-- End of container-->  

@stop
{{-- end of content  --}}