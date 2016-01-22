@extends('layouts.master')

@section('top-script')

@stop 
{{-- line above is end of top script --}}
@section('content')

<div class="container">
        <div class="row">

        	<div class="col-md-2 text-center">
                <p>Welcome, {{{ Auth::user()->firstname }}}</p>
                <a href="{{{ action('NotesController@create') }}}" class="btn btn-default">Create a New Note</a>
            </div>

            <div class="col-md-8">
                <h2 class="text-center">Notes Index</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            {{-- <th>votes recieved</th> --}}
                            <th>date created</th>
                            <th>title</th>
                            <th>privacy setting</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($notes as $note)
                            <tr>
                            	{{-- <td><a href="{{ action('NotesController@votes') }}">{{ $note->title }}</a></td> --}}

                                <td>{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>

                                <td><a href="{{ action('NotesController@show', ($note->slug)) }}">{{ $note->title }}</a></td>

                                <td>{{{ $note->public_or_private }}}</td>
                                <td><a class="btn btn-default" role="button" href="{{{ action('NotesController@edit', $note->slug) }}}">Edit this Note</a></td>

                                <td>{{ Form::model($note, array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                {{ Form::close() }}</td>
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

@section('bottom-script')
@stop
{{-- end of bottom script	 --}}
