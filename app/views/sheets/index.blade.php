@extends('layouts.master')

@section('content')
	
	<div class="container pushdown">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				@foreach($posts as $post)
					<div class="row">
						<div class="col-sm-4 text-center">
							<div class="imgholder" style="background:url(/{{{ $post->image_url }}}) center center no-repeat;background-size:cover;">
							</div> <!-- end imgholder -->
						</div> <!-- end col-sm-4 -->

						<div class="col-sm-8">	
							<div class="datebox">
								<h2 class="date">{{{ $post->created_at->setTimezone('America/Chicago')->format('M d') }}}</h2>
                                <div class="ribbonholder">
                                    <div class="ribbonmain">
	                                    <div class="ribbonend">
		                                    <div class="ribbontriangle"></div>
	                                    </div> <!-- end ribbonend -->
                                    </div> <!-- end ribbonmain -->
                                </div> <!-- end ribbonholder -->
                                    	<a class="title" href="{{{ action('PostsController@show', $post->slug) }}}">{{{ Str::limit($post->title, 16) }}}</a>
							</div> <!-- end datebox -->
							
							<p class="bodybox">{{{ Str::limit($post->body, 145) }}}</p>
							
							<div class="row">
								<div class="col-xs-4 text-left">
									<span class="greyout">Posted by {{{ $post->user->first_name }}}</span>
								</div> <!-- end col-xs-4 -->
								@if (Auth::check())	
									<div class="col-xs-4 text-center">
		                                <a class="greyout btn-default" href="{{{ action('PostsController@edit', $post->id) }}}">Edit this post</a>
									</div> <!-- end col-xs-4 -->
									<div class="col-xs-4 text-right">
		                                {{ Form::model($post, array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
			                                    <button class="btn btn-danger deletebtn" type="submit">Delete</button>
		                                {{ Form::close() }}
									</div> <!-- end col-xs-4 -->
								@endif
							</div> <!-- end row -->  
						</div> <!-- end col-sm-8 -->
					</div> <!-- end row -->
					<div class="postline"></div>
				@endforeach
				<div class="text-center">
	                {{ $posts->links() }}
				</div>
			</div> <!-- end col-md-8 -->

		</div> <!-- end row -->	
	</div> <!-- end container -->

@stop