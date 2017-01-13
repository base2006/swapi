<?php
$people = ''
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SWAPI</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<label for="">Find your Star Wars character:</label>
					<input type="text" class="form-control fuzzy">
				</div>
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2 person">
					<div class="panel panel-default">
					  <!-- Default panel contents -->
					  <div class="panel-heading">Star Wars characters</div>
					  <!-- List group -->
					  <ul class="list-group">
					  </ul>
					</div>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/2.5.0/fuse.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
