@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter an email address to invite someone to collaborate with you on this sheet!</h3>
			<form class="form-horizontal" method="POST" action="{{{action('CollaborationController@invitesheet', array($sheet->id))}}}">
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<button class="btn btn-success">Invite!</button>
			</form>
		</div>
	</div>
</div>
@stop