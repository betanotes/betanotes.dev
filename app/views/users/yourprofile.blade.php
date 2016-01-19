@extends('layouts.master')
<!DOCTYPE html>
<html>
<head>
	<title>Your Profile</title>
</head>
<body class="profilepagebody">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<img src="{{{$user->image_url}}}">
			</div>
			<div class="col-lg-6 text-center">
				<ul class="profilehead">
					<h2><li>{{{$user->firstname}}} {{{$user->lastname}}}</li></h2>
					<h2><li>{{{$user->affiliation}}}</li></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1 class="profileheading">Your Recent Notes</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<ul class="profilesubstance">
				<h3><li>Biology Notes #1</li></h3>
				<button class="btn btn-primary">All Your Notes</button>
			</ul>
			
		</div>
	</div>
	<a href="{{{action('UsersController@logout')}}}"><button class="btn btn-danger">Log Out</button></a>
</div>
</body>
</html>