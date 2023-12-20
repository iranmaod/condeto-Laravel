/*
	Generic removing function.
	post_type = event type (event_facility)
	post_data = form data object with fields
	callback = a variable set up as a function to call after
*/

function remove_record(post_type, post_data, post_id, callback)
{
	// prepare url
	var url = '/delete/' + post_type + '/' + post_id;
	
	// call the ajax
	$.ajax({
		url : url,
		type: "POST",
		data : post_data,
		dataType: 'json',
		processData: false,
		contentType: false,
		success:function(data, textStatus, jqXHR){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(data, textStatus, jqXHR);			
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(data, textStatus, jqXHR);			
			
		}
	});
	
}

function archive_record(post_type, post_data, post_id, callback)
{
	// prepare url
	var url = '/archive/' + post_type + '/' + post_id;
	
	// call the ajax
	$.ajax({
		url : url,
		type: "POST",
		data : post_data,
		dataType: 'json',
		processData: false,
		contentType: false,
		success:function(data, textStatus, jqXHR){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(data, textStatus, jqXHR);			
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			
			// call the call back function 			
			if (typeof callback === 'function')			
				callback(data, textStatus, jqXHR);			
			
		}
	});
	
}