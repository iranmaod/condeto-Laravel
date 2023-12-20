function labelFormatter(label, series) {
	return "<div style='font-size:12px;font-weight:bold; text-align:center; padding:2px; color:#000;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}

$(document).ready(function() {
	
	$('.stat_entity .more_info_block_link').data('toggle_status',0);
	
	$('.stat_entity .more_info_block_link').click(function() {		
		var parent = $(this).closest('.stat_entity');		
		parent.find('.more_info').slideToggle();
		if ($(this).data('toggle_status') == 0)
		{
			$(this).find('p').html('<span>less info</span> <i class="fa fa-chevron-up"></i>');
			$(this).data('toggle_status',1);
		}
		else
		{
			$(this).find('p').html('<span>more info</span> <i class="fa fa-chevron-down"></i>');
			$(this).data('toggle_status',0);
		}
	});
	
	$('.more_info').each(function() {
		if (typeof $(this).data('data_value') !== "undefined")
		{
			var data = eval($(this).data('data_value')); //TODO.. check eval.. ?
			var placeholder = $(this).find('.chart');
			placeholder.unbind();

			$.plot(placeholder, data, {
				series: {
					pie: { 
						innerRadius: 0.5,
						show: true,
						label: {
							formatter: labelFormatter,
						},
						combine: {
							color: '#999',
							threshold: -1 // dont combine pie values
						}
					}							
				},
				legend: {
					show: false
				}				
			});
		}
		$(this).hide();
	});
		
});