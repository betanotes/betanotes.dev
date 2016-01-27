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
			
			<h4>edit or delete profile</h4>
		
			<a href="{{{action('UsersController@showedit')}}}"><button class="btn btn-edit">Edit</button></a>
			{{Form::model($user, array('action' => array('UsersController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-user-id' => $user->id)) }}
			{{Form::close()}}
			<button class="btn btn-danger deleter" data-id="{{{$user->id}}}" data-name="{{{$user->firstname}}}">Delete</button>
		</div><!--end col-md-3-->
		<div class="col-md-9">
			<div class="row">
				<div class="col-xs-4 text-center">
					<h2>Notes</h2>
					
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
					<h2>Sheets</h2>
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
					<h2>Meets</h2>
					<h4>(Are always public!)</h4>
					<h1>{{{ $publicmeetups->count() }}}</h1>
				</div>
			</div> <!-- end row -->
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3>My Top Everything with Votes</h3>
					<table class="table table-hover table-responsive" name="mytable" id="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th>title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($yoursheets as $sheet)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span></td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a> <small>(sheet)</small></td>
                            </tr>
                        @endforeach
                        @foreach($yournotes as $note)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span></td>
                                <td><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 40) }}}</a> <small>(note)</small></td>
                            </tr>
                        @endforeach
                        @foreach($yourmeetups as $meetup)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                                <td><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 40) }}}</a> <small>(social study)</small></td>
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
@section('bottom-script')
<script>
	"Use Strict";
	$(".deleter").click(function(event) {
		event.preventDefault();
		var userid = $(this).data("id");
		var username = $(this).data("name");
		if(confirm("Are you sure you want to leave Social Notes forever, " + username + "?")) {

			$('form[data-user-id="' + userid + '"]').submit();
		}
	});
</script>
@stop
</body>
</html>