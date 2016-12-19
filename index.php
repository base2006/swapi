<?php
$people = ''
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SWAPI</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
				<div class="col-md-8 col-md-offset-2 person" style="display: none;">
					<div class="panel panel-default">
					  <!-- Default panel contents -->
					  <div class="panel-heading">Names Star Wars characters</div>
					  <!-- List group -->
					  <ul class="list-group">
					  </ul>
					</div>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/2.5.0/fuse.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var people = [];
				var url = 'http://swapi.co/api/people/';
				var c = 1;
				var start_time = new Date().getTime();

				function getPeople() {
					$.ajax({
						url: url,
						success: function(data) {
							$.each(data.results, function(i, result) {
								people.push(result);
							});
							if (data.next !== null) {
								c++;
								url= 'http://swapi.co/api/people/?page=' + c;
								getPeople();
							} else {
								return true;
							}
						}
					});
				}

				getPeople();

				var options = {
					shouldSort: true,
					threshold: 0.6,
					location: 0,
					distance: 100,
					maxPatternLength: 32,
					minMatchCharLength: 1,
					keys: [
					"name",
					]
				};
				var fuse = new Fuse(people, options);
				var result = '';

				$('.fuzzy').keyup(function(){
					$('.person .list-group').empty();
					$('.person').show();

					if ($('.fuzzy').val().length == 0) {
						$('.person').hide();
					}

					result = fuse.search($('.fuzzy').val());
					$.each(result, function(i, person) {
						$('.person .list-group').append('<li class="list-group-item">' + person.name + '</li>');
					});
				});
			});
		</script>
	</body>
</html>
