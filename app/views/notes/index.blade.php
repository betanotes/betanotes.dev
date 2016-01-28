@extends('layouts.master')

@section('content')

<div class="container containermargins">
    <div class="row">
    	<div class="col-md-2 text-center">
            <img src="/img/note.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            <a href="{{{ action('NotesController@create') }}}" class="btn btn-create" role="button">Create New Note</a>
        </div>
        <div class="col-md-9">
            <h2 class="text-center">Notes</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>votes</th>
                        <th class="hidden-sm hidden-xs">date created</th>
                        <th>title</th>
                        <th class="hidden-sm hidden-xs">privacy setting</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($notes as $note)
                        <tr>
                        	<td><span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span></td>
                            <td class="hidden-sm hidden-xs">{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                            <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{ action('NotesController@show', ($note->slug)) }}">{{{ Str::limit($note->title, 40) }}}</a></td>
                            <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{ action('NotesController@show', ($note->slug)) }}">{{{ Str::limit($note->title, 15) }}}</a></td>
                            <td class="hidden-sm hidden-xs">{{{ $note->public_or_private }}}</td>
                            <td><a class="btn btn-edit" role="button" href="{{{ action('NotesController@edit', $note->slug) }}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $notes->links() }}
            </div>
        </div> <!-- end col-md-8 -->

    </div> <!-- end row -->
</div> <!-- end container -->

@stop 
{{-- end of content	 --}}