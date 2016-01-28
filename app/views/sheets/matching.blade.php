@extends('layouts.master')

@section('content')

    <div class="container containermargins">
        <div class="row pushdown">

            <div class="col-md-12 text-center">
                <a class="btn btn-back matchingbtn" role="button" href="{{{ action('SheetsController@show', $sheet->slug) }}}">Back to Study Sheet</a>
                <img src="/img/game.gif" class="img-responsive img-inline img-margintop matchingimg" alt="Responsive image">
                <h2 class="matchingtitle">{{{ $sheet->title }}} Matching Game</h2>
                <h2 id="thecountdown">20</h2>
            </div> <!-- end col-md-12 -->

        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-12 pushsheetlistdown text-center matchingblock">
                <?php $i = 1; ?>
                @foreach($sheet->lines as $line)
                    <div class="cluematch" data-clue="{{{ $i }}}">{{{ $line->clue }}}</div>
                     
                    <div class="responsematch" data-response="{{{ $i }}}">{{{ $line->response }}}</div>
                    <?php $i = $i + 1; ?>
                @endforeach
            </div> <!-- end col-md-12 -->
            
        </div> <!-- end row -->
    </div> <!-- end container -->

@stop