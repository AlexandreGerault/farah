<!DOCTYPE HTLM>
<html>
	<head>
		<title>Professeure d'anglais - Farah Ganny</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/app.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		@yield('content')
		<script src="js/app.js"></script>
	</body>
</html>
