@extends('layouts.master')

@section('content')
    
<div class="container containermargins">
	<div class="row">

		<div class="col-md-2 text-center">
	        <img src="/img/note.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
	        <a  class="btn btn-back" role="button" href="{{{ action('NotesController@index') }}}">Back to Your Notes</a>
        </div> <!-- end col-md-2 -->

		<div class="col-md-8 createNote">

			<h2 class="text-center">Edit Your Note</h2>
			{{ Form::open(array('action' => array('NotesController@update', $note->id), 'method' => 'PUT')) }}

				<div class="form-group">
					{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', $note->title, ['class' => 'form-control', 'placeholder' => 'Edit title']) }}
				</div>	

				<div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('public_or_private', '<span class="help-block">:message</span>') }}    

                                <label>Privacy Setting</label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private1" value="public" 
                                    @if ($note->public_or_private == "public") {{ "checked" }}
                                     @endif 
                                    > Public
                                </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private2" value="private" @if ($note->public_or_private == "private") {{ "checked" }} @endif
                                    > Private
                                </label>
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->

				<div class="form-group">
					{{ $errors->first('body', '<span class="help-block">:message</span>') }}
			  		{{ Form::label('body', 'Body') }}
					{{ Form::textarea('body', $note->body, ['class' => 'form-control', 'id' => 'editor1', 'rows' => '10', 'placeholder' => 'Enter notes title']) }}
				</div>	

				<button type="submit" class="btn btn-edit signmarginbottom">Update</button>

			{{ Form::close() }}

		</div><!--end col-md-8-->
	</div><!-- end row -->
</div><!--end container-->

@stop 
{{-- end of content	 --}}

@section('bottom-script')

<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script src="/ckeditor/ckeditordata/js/sf.js"></script>
<script>CKEDITOR.replace( 'editor1' )</script>
<script src="/ckeditor/config.js"></script>
@stop
{{-- end of bottom script	 --}}