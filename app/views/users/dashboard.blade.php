<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<h1>This is the dashboard page</h1>
@foreach($user as $theuser)
<h3>{{{"Hello, $theuser->firstname!"}}}</h3>
@endforeach
</body>
</html>