@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter an email address to invite someone to join this Social Study!</h3>
			<form class="form-horizontal" method="POST" action="{{{action('MeetupsController@inviteguest', array($meetup->id))}}}">
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<button class="btn btn-success">Invite!</button>
			</form>
			<a href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}"><button class="btn btn-primary">Back</button></a>
		</div>
	</div>
</div>
@stop