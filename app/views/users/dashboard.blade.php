@extends('layouts.master')

@section('content')

<div class="container containermargins">
    <div class="row">
        <div class="col-md-3 text-center">
            <img class="profilepic img-inline img-responsive" src="{{{$user->image_url}}}">
            <div class="aboutMe">
                <h3>Age: {{{ $user->age }}}</h3>
                <h2>{{{ $user->affiliation }}}</h2>
                <p>{{{ $user->description }}}</p>
            </div>
            
            <h4>Edit Profile</h4>
            <a href="{{{action('UsersController@showedit')}}}"><button class="btn btn-edit">Edit</button></a>
        </div> <!--end col-md-3-->

        <div class="col-md-9">
            <div class="row  hidden-sm hidden-xs">
                <div class="col-xs-4 text-center">
                    <h3>Social Notes</h3>
                    
                    <div class="row">
                        <div class="col-xs-6 text-right numberDivider">
                            <h4>public</h4>
                            <h1>{{{ $publicnotes->count() }}}</h1>
                        </div>
                        <div class="col-xs-6 text-left">
                            <h4>private</h4>
                            <h1>{{{ $privatenotes->count() }}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 text-center">
                    <h3>Social Study Sheets</h3>
                    <div class="row">
                        <div class="col-xs-6 text-right numberDivider">
                            <h4>public</h4>
                            <h1>{{{ $publicsheets->count() }}}</h1>
                        </div>
                        <div class="col-xs-6 text-left">
                            <h4>private</h4>
                            <h1>{{{ $privatesheets->count() }}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 text-center">
                    <h3>Social Study Groups</h3>
                    <h4 class="h4extrapadding">(always public)</h4>
                    <h1>{{{ $publicmeetups->count() }}}</h1>
                </div>
            </div> <!-- end row -->

            <!-- mobile view of public and private stats -->
            <div class="row hidden-md hidden-lg">
                <div class="col-xs-12 text-center">
                    <h3>Social Notes</h3>
                    <h4>{{{ $publicnotes->count() }}} public | {{{ $privatenotes->count() }}} private</h4>
                    <h3>Social Study Sheets</h3>
                    <h4>{{{ $publicsheets->count() }}} public | {{{ $privatesheets->count() }}} private</h4>
                    <h3>Social Study Groups</h3>
                    <h4>{{{ $publicmeetups->count() }}} (always public)</h4>
                </div>
            </div> <!-- end row -->

            <div class="row topratedmargintop">
                <div class="col-xs-12">
                    <h3 class="text-center">Your Top Rated Contributions</h3>
                    <table class="table table-striped mytable" name="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th class="row hidden-sm hidden-xs">date created</th>
                            <th>title</th>
                            <th>edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($yoursheets as $sheet)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span></td>
                                <td class="row hidden-sm hidden-xs">{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a> <small>(sheet)</small></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 15) }}}</a> <small>(sheet)</small></td>
                                <td><a class="btn btn-edit" role="button" href="{{{ action('SheetsController@edit', $sheet->id) }}}">Edit</a></td>
                            </tr>
                        @endforeach
                        @foreach($yournotes as $note)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span></td>
                                <td class="row hidden-sm hidden-xs">{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="row hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 40) }}}</a> <small>(note)</small></td>
                                <td class="row hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 15) }}}</a> <small>(note)</small></td>
                                <td><a class="btn btn-edit" role="button" href="{{{ action('NotesController@edit', $note->slug) }}}">Edit</a></td>
                            </tr>
                        @endforeach
                        @foreach($yourmeetups as $meetup)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                                <td class="row hidden-sm hidden-xs">{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 40) }}}</a> <small>(social study)</small></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 15) }}}</a> <small>(social study)</small></td>
                                <td><a class="btn btn-edit" role="button" href="{{{ action('MeetupsController@showedit', $meetup->id) }}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div><!--end row-->
        </div><!--end col-md-9-->


    </div>
    </div>
</div>

@stop