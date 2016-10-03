$(document).ready(function() {
	var token_name = $("#_token_name").attr('content');
	var token_value = $("#_token_value").attr('content'); 
 	
 	var ajaxSetupData = {};
 	ajaxSetupData[token_name] = token_value;
    $.ajaxSetup({
        data: ajaxSetupData
    });

    var data = {};

 	data['name'] = 'hi';
	// send request with hash
	$.ajax({
	  type: "POST",
	  url: base_url + 'home/temp/',
	  data: data,
	  success: function(res) {
	  	console.log('success');
	  	console.log(res);
	  },
	  dataType: 'json'
	});

	$(".navbar-right .dropdown-toggle").click();
});