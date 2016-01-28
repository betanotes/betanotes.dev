@extends('layouts.master')

@section('content')
    
<div class="container containermargins">
	<div class="row">

		<div class="col-md-2 text-center">
            <img src="/img/note.gif" class="img-responsive img-inline" alt="Responsive image">
            <a  class="btn btn-back" role="button" href="{{{ action('NotesController@index') }}}">Back</a>
        </div> <!-- end col-md-2 -->

		<div class="col-md-8 createNote">
			
			{{ Form::open(array('action' => 'NotesController@store')) }}


				<div class="form-group">
					{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter notes title']) }}
				</div>

				 <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ $errors->first('public_or_private', '<span class="help-block">:message</span>') }}    

                                <label> Privacy Setting </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private1" value="public" checked> Public
                                </label>
                                <label class="radiomargin">
                                    <input type="radio" name="public_or_private" id="public_or_private2" value="private"> Private
                                </label>
                            </div> <!-- end form-group -->
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->

				<div class="form-group">
					{{ $errors->first('body', '<span class="help-block">:message</span>') }}
				  	{{ Form::label('body', 'Body') }}
				  	{{ Form::textarea('body', null, ['class' => 'form-control', 'name' => 'body', 'id' => 'editor1', ]) }}
	            </div>	

			 	<input name="user_id" type="hidden" value="1">
			 	<a href="{{{ action('NotesController@index') }}}" class="btn btn-default">Cancel</a>
			  	<button type="submit" class="btn btn-warning">Submit</button>

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