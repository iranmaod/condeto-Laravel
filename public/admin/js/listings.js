$(window).on('load',function () {
	
	$('#building_change').unbind('change').on('change', function () {
		// get current url.. 
		var current_url = document.location.href;
		
		// get part without #
		var url_parts = current_url.split('#');
		var new_url = url_parts[0];
		
		// array to join later
		var url_parameters = new Array();
		
		// lets split any parameters.. 
		url_parts = new_url.split('?');
		
		// assign url to the part without parameters
		new_url = url_parts[0];
		
		// if we have url parameters
		if (typeof url_parts[1] !== 'undefined')
		{
			// for each parameter block
			url_parts[1].split('&').forEach(function (item) {

				// if its already a change building we i
				if (!item.includes('change_building='))
					url_parameters.push(item);
				
			});
		}
		
		// always use the ? as we removed earlier
		new_url = new_url + '?';
		
		// set the change parrameter
		new_url = new_url + 'change_building=' + $(this).val();
		
		// tag in any additional parameters.
		if (url_parameters.length > 0)
			new_url = new_url + '&' +  url_parameters.join('&');
		
		// relocate document
		document.location.href = new_url;
	});
	
});

function deleteListingItem(clicked_object)
{
	$.confirm({
		title: $(clicked_object).data('message_title'),
		content: $(clicked_object).data('message_text'),
		buttons: {
			confirm: function () {

				post_data = {
					id: $(clicked_object).data('id')
				};

				// call the ajax
				$.ajax({
					url : $(clicked_object).attr('href'),
					type: "POST",
					data : post_data,
					dataType: 'json',
					success:function(response)
					{
						if (response.result == 1)
						{
							$(clicked_object).closest('tr').fadeOut(300, function () {
								$(this).remove();
							});
							$.alert({title: 'Info', content: $(clicked_object).data('confirmed')});
						}
						else						
							$.alert({title: 'Info', content: $(clicked_object).data('failed')});
					}
				});				
			},
			cancel: function () {
			}
		}
	});
}