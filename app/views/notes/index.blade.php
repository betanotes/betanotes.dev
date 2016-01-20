@extends('layouts.master')

@section('top-script')

@stop 
{{-- line above is end of top script --}}
@section('content')
    
<div class=('container-fluid createNote')>
	<div class=('row')>
		<div class=('col-md-12 createNote')>

			<h1>HIIIIIIIII</h1>
	@foreach($notes as $note)
			{{{ $note->title }}}

	@endforeach		

		</div><!--end col-md-12-->
	</div><!-- end row -->
</div><!--end container-->	

@stop 
{{-- end of content	 --}}

@section('bottom-script')
@stop
{{-- end of bottom script	 --}}
