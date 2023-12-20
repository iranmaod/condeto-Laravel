/*
	Generic search functions.
	search_type = message type (message_user)
	search_data = form data object with fields
	callback = a variable set up as a function to call after
	
*/

function search(search_type, search_data, callback)
{
	// prepare the url appending the type
	var url = '/search/' + search_type;
	
	// make an ajax call
	$.ajax({
		url : url,
		type: "POST",
		data : search_data,
		dataType: 'json',
		processData: false,
		contentType: false,
		success:function(data, textStatus, jqXHR){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(true, data, textStatus, jqXHR, data.length);			
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(false, data, textStatus, jqXHR, 0);			
			
		}
	});
		
	
}



/* test code that would go in seperate files */

// prepare variable for call back function
var do_something = function (success, data, textStatus, jqXHR, record_count) 
{
	$('.loadArea').text('');
	// if okay.. this is success of the ajax call itself..
	if (success)
	{
		// load the count
		$('.loadArea').text('Loaded ' + record_count + ' records');
		// output the ids
		for (var i = 0;i < data.length; i++)
		{
			// output this way as it protects against xss. using text to output 
			var new_block = $('<div class="json_block"><strong></strong><br /><br /><pre></pre></div>');
			
			new_block.find('strong').text('Record #'+i);
			new_block.find('pre').text(JSON.stringify(data[i]));
			new_block.appendTo('.loadArea');
		}
		
	}
	else
	{
		// not okay..
		$('.loadArea').text('Not Loaded ');
	}
	
};


$(document).ready(function () {
	
	// bind the button
	$('#loadData').unbind('click').bind('click',function () {
		
		$('.loadArea').text('Loading');
		
		// prepare the form data object
		var fd = new FormData();   
		
		// convert params in text to array. in this instance
		if ($('#parameters').val().trim() != '')
		{
		
			// get a array of lines from the parameters
			var params = $('#parameters').val().trim().split('\n');
			
			for (var i = 0;i < params.length; i++)
			{
				// split on the =
				var param_split = params[i].split('=');
				
				// append the data
				fd.append(param_split[0],param_split[1]);
				
			}
			
		}
	
		// call the search
		search($('#load_type').val(),fd, do_something);
		
	});
});
