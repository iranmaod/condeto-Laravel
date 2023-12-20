/*
	Generic post function.
	post_type = event type (event_facility)
	post_data = form data object with fields
	callback = a variable set up as a function to call after
*/

function post(post_type, post_data, callback)
{
	// prepare url
	var url = '/post/' + post_type;
	
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



/* test code that would go in seperate files */

// after the message has posted
var after_post = function (data, textStatus, jqXHR) 
{
	// check the result.
	if (data.result == 0)
	{
		// been an error..
		var error_text = '<ul>';

		// loop through the errors
		for (var i = 0; i < data.errors.length; i++)
			error_text = error_text + '<li>'+ data.errors[i] +'</li>';
		
		error_text = error_text + '</ul>';		
		
		// output the errors
		$('#saveoutput').html(error_text);
	}
	else
	{
		// Output the saved id
		$('#saveoutput').text('Saved : ID ' + data.result);
	}
	
};


$(document).ready(function () 
{
	// bind button click
	$('#saveForm').unbind('click').bind('click',function () {
		
		// convert params in text to array.		
		var fd = new FormData(); 
		
		// append form details
		fd.append('title',$('#element_1').val());
		fd.append('message',$('#element_2').val());
		fd.append('parent_message_id',$('#element_3').val());
		fd.append('object_id',$('#element_4').val());
		fd.append('user_id',$('#element_5').val());
		fd.append('category_id',$('#element_6').val());
		
		// check box.
		if ($('#element_10_1').is(':checked')) 
			fd.append('active',1);
		else
			fd.append('active',0);
	
		// make post request
		post('message_user',fd, after_post);
		
	});
});



var after_event_post = function (data, textStatus, jqXHR) 
{
	// check the result.
	if (data.result == 0)
	{
		// been an error..
		var error_text = '<ul>';

		// loop through the errors
		for (var i = 0; i < data.errors.length; i++)
			error_text = error_text + '<li>'+ data.errors[i] +'</li>';
		
		error_text = error_text + '</ul>';		
		
		// output the errors
		$('#saveoutput2').html(error_text);
	}
	else
	{
		// Output the saved id
		$('#saveoutput2').text('Saved : ID ' + data.result);
	}
	
};


$(document).ready(function () 
{
	// bind button click
	$('#saveForma').unbind('click').bind('click',function () {
		
		// convert params in text to array.		
		var fd = new FormData(); 
		
		// append form details
		fd.append('sub_type_id',$('#element_1a').val());
		fd.append('status',$('#element_2a').val());
		fd.append('object_id',$('#element_4a').val());
		fd.append('user_id',$('#element_5a').val());
		fd.append('start_time',$('#element_6a').val());
		fd.append('end_time',$('#element_7a').val());
		fd.append('assigned_user',$('#element_8a').val());		
		
		// check box.
		if ($('#element_10_1a').is(':checked')) 
			fd.append('active',1);
		else
			fd.append('active',0);
	
		// make post request
		post($('#event_type').val(),fd, after_event_post);
		
	});
});


var after_facility_post = function (data, textStatus, jqXHR) 
{
	// check the result.
	if (data.result == 0)
	{
		// been an error..
		var error_text = '<ul>';

		// loop through the errors
		for (var i = 0; i < data.errors.length; i++)
			error_text = error_text + '<li>'+ data.errors[i] +'</li>';
		
		error_text = error_text + '</ul>';		
		
		// output the errors
		$('#saveoutput3').html(error_text);
	}
	else
	{
		// Output the saved id
		$('#saveoutput3').text('Saved : ID ' + data.result);
	}
	
};


$(document).ready(function () 
{
	// bind button click
	$('#saveFormfacility').unbind('click').bind('click',function () {
		
		// convert params in text to array.		
		var fd = new FormData(); 
		
		// append form details
		fd.append('property_id',$('#propertyid').val());
		fd.append('name',$('#facilityname').val());
		fd.append('description',$('#description').val());
		fd.append('location',$('#location').val());
		
		// make post request
		post('facility',fd, after_facility_post);
		
	});
});