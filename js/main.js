$(document).ready(function() {
	var people = [];
	var url = 'http://swapi.co/api/people/';
	var p = 1;

	function getPeople() {
		$.ajax({
			url: url,
			success: function(data) {
				$.each(data.results, function(i, result) {
					people.push(result);
				});
				if (data.next !== null) {
					p++;
					url= 'http://swapi.co/api/people/?page=' + p;
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
		threshold: 0.5,
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
