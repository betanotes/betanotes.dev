@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			@foreach($allmeetups as $meetup)
				<ul>
					<li>{{{$meetup->title}}}</li>
					<li>{{{$meetup->description}}}</li>
					<li>{{{$meetup->location}}}</li>
					<li>{{{$meetup->date}}} at {{{$meetup->time}}}</li>
				</ul>
			@endforeach
		</div>
	</div>
</div>
@stop