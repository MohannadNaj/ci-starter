
if(typeof bio_max_length !== "undefined") {
	$('#bio + .count_message .counter').html(bio_max_length);

	$('#bio').on("input", function() {
	  var text_length = $('#bio').val().length;
	  var text_remaining = parseInt(bio_max_length) - text_length;
	  
	  $('#bio + .count_message .counter').html(text_remaining);
	});

	$(document).ready( $("#bio").trigger("input"));
}