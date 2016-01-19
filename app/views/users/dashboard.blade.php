@extends('layouts.master')
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-14 text-center dashboardnavbar">
			<div class="col-lg-3 navlink">
				Profile
			</div>
			<div class="col-lg-3 navlink">
				Notes
			</div>
			<div class="col-lg-3 navlink">
				Lists
			</div>
			<div class="col-lg-3 navlink">
				Quizzes
			</div>
		</div>
	</div>
</div>
<h1 class="text-center">Hello, {{{$user->firstname}}}!</h1>
<div class="container dashboard">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-4 dashboardheader">
				<h3>Your Profile</h3>
			</div>
			<div class="col-lg-4 dashboardheader">
				<h3>Your Notes</h3>
			</div>
			<div class="col-lg-4 dashboardheader">
				<h3>Your lists</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-4 dashboardcolumn">
				<ul>
					<li><img src="{{{$user->image_url}}}"></li>
					<li><h5>Your Name: {{{$user->firstname}}} {{{$user->lastname}}}</h5></li>
					<li><h5>Your Email: {{{$user->email}}}</h5></li>
				</ul>
			</div>
			<div class="col-lg-4 dashboardcolumn">
				<ul>
					<li><h5>Biology Notes #1</h5></li>
					<li><h5>Biology Notes #2</h5></li>
				</ul>
			</div>
			<div class="col-lg-4 dashboardcolumn">
				<ul>
					<li><h5>Biology Quiz #1</h5></li>
					<li><h5>Biology Quiz #2</h5></li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>