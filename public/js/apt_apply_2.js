jQuery(document).ready(function () 
{
	
	// header back link default action. 
	$('.header_back_link').unbind('click').on('click', function (e) {
		e.preventDefault();
		
		history.back(1);
		
	});
	
	prepare_toggle_areas();
	
	$('#Submitlogin').on('click',function (e) {
		e.preventDefault();
		loginAttempt();
	});
	
	set_heights();
	
	// generic jquery based search box
	$('#layout_table_search').unbind('keyup').on('keyup', function (e) {
		
		// get the target table
		var search_table = '#' + $(this).data('table');
		
		// hide default
		$(search_table).find('.layout_table_row:not(.layout_table_row_header)').hide();
		
		// find matching rows
		$(search_table).find(".layout_table_row:contains('" + $(this).val() + "')").each(function () 
		{
			// show matching records but not if its the header.
			if (!$(this).hasClass('layout_table_row_header'))
				$(this).show();
		});
		
	});
	
	// building change
	$('.swap_property_container .swap_property_inner_container select').unbind('change').on('change', function () {
		
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
		
		// before we do this lets check if we are in the pages which have a property reference. if so we go back to the building page.
		if (new_url.includes('properties_list/'))		
			new_url = '/building'; 
			
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
	
	$('.trigger_change_building').unbind('click').on('click', function (e) {
		
		e.preventDefault();
		trigger_change_building();
		
	});
	
	// close events for building change.
	$('.swap_property_container').unbind('click').on('click', function (e) {
		
		e.preventDefault();
		// if outer container clicked we close layer
		if ($(e.target).hasClass('swap_property_container'))
			$(this).fadeOut(300);
		
	});
	
	if (typeof selectpicker !== 'undefined')
		$('.selectpicker').selectpicker();

	$('.footer_toolbar ul li a.more').unbind('click').on('click', function (e) {
		e.preventDefault();
		$(this).parent().find('ul').fadeToggle();
	});
	
});

function trigger_change_building()
{
	$('.swap_property_container').fadeIn(200);
}

function set_heights()
{
	// get the height of the heading.. This is variable depending on the screen and page.
	var header_height = $('.main_header').outerHeight(true);
	$('.main_content_area').attr('style','height:calc(100% - ' + header_height + 'px) !important;');
	
}

function makeToast(message, display_length)
{
	if (typeof display_length === 'undefined')
		display_length = 3000;
	
	if ($('.toast').length)	
		$('.toast').text(message);
	else
		$('<div class="toast"><p></p></div>').appendTo('body').find('p').text(message);
	
	$('.toast').fadeIn(600, function () {
		setTimeout(function () {
			$('.toast').fadeOut(600);
		}, display_length);
	});
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function loginAttempt()
{
	
	// validation. all filled in
	if ($('#emaillogin').val() == '' || $('#passwordlogin').val() == '')
		return triggerLoginError('Please enter all fields');
	
	// valid email
	if (!validateEmail($('#emaillogin').val()))
		return triggerLoginError('Please enter a valid email address');
	
	var data = $('body').serializeArray();
	data.push({name: "email", value: $('#emaillogin').val()});
	data.push({name: "password", value: $('#passwordlogin').val()});
	
	$.ajaxSetup({async:false});
	
	$.post("/user/login",
		data
	,
	function(data)
	{
		if (data.data.result == '200')
		{			
			if (data.data.in_app == 1)
			{
				//triggerLoggedIn(false);
				// redirect to intermediate page.. 
				document.location.href = '/apphook/validate/' + data.data.user_id +'/'+data.data.user_token;				
			}
			else
			{
				// persistent login.?
				if ($('#persist_login').prop('checked'))
				{
					setCookie('condeto_revalidate',data.data.user_token,365); // store a cookie.
					setCookie('condeto_revalidate_id',data.data.user_id,365); // store a cookie.					
				}
				else
				{
					document.cookie = "condeto_revalidate=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // remove any cookies for this
					document.cookie = "condeto_revalidate_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // remove any cookies for this
				}
				
				triggerLoggedIn(false);
			}
				
		}
		else
		{
			triggerLoginError(data.data.message);
		}

	}, "json");

	$.ajaxSetup({async:true});  //return to default setting
}

function autoLoginAttempt(id, token)
{
	
	var data = $('body').serializeArray();
	data.push({name: "id", value: id});
	data.push({name: "token", value: token});
	
	$.ajaxSetup({async:false});
	
	$.post("/user/login/token",
		data
	,
	function(data)
	{
		if (data.data.result == '200')
		{			
			if (data.data.in_app == 1)
			{
				//triggerLoggedIn(false);
				// redirect to intermediate page.. 
				document.location.href = '/apphook/validate/' + data.data.user_id +'/'+data.data.user_token;				
			}
			else
			{
				triggerLoggedIn(false);
			}
				
		}
		else
		{
			document.cookie = "condeto_revalidate=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // remove any cookies for this
			document.cookie = "condeto_revalidate_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // remove any cookies for this
			triggerLoginError(data.data.message);
		}

	}, "json");

	$.ajaxSetup({async:true});  //return to default setting
}

function triggerLoggedIn(initial)
{
	user_active = true;	
	
	// did the user select save user id option?
	if ($('#save_username').prop('checked'))
		setCookie('condeto_username',$('#emaillogin').val(),365); // store a cookie.
	else
		document.cookie = "condeto_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // remove any cookies for this
		
	$('.login_or_register').remove();
	$('.loggedInRestricted').fadeIn();
	$('.registerErrorMessage,.loginErrorMessage,.hideOnLoggedIn').fadeOut();	
	
	reset_at_login();
	
	if ($('#apy_apply_form').length == 0)
		document.location = '/dashboard';
	
}

function triggerLoginError(message)
{
	user_active = false;
	$('.loginErrorMessage').text(message);
	$('.loggedInRestricted').fadeOut();
	$('.loginErrorMessage,.hideOnLoggedIn').fadeIn();
	//bind_forgot_password_button();
	return false;
}

function prepare_toggle_areas()
{
	$('.field_checkbox_toggle').each(function () {
		
		if ($(this).find('.toggle_area').length > 0)
			return;
		
		// find checkbox		
		var toggle_area_checkbox = $(this).find('input[type="checkbox"]');
		
		// hide checkbox
		toggle_area_checkbox.hide();
				
		// inject the toggle code.		
		$('<div class="toggle_area"><ul><li class="active">On</li><li>Off</li></ul></div>').appendTo($(this));
		
		// set values
		if (!toggle_area_checkbox.prop("checked"))
		{
			$(this).find('li').eq(0).removeClass('active');
			$(this).find('li').eq(1).addClass('active');
		}
		
	});
	
	// toggle area click event
	$('.toggle_area').unbind('click').bind('click',function () {
		
		// get checkbox
		var toggle_area_checkbox = $(this).closest('.field_checkbox_toggle').find('input[type="checkbox"]');
		
		// set checkbox state
		toggle_area_checkbox.prop("checked", !toggle_area_checkbox.prop("checked"));
		
		// trigger the change event.
		toggle_area_checkbox.trigger('change');
		
		// setup toggle 
		if (toggle_area_checkbox.prop("checked"))		
		{
			$(this).find('li').eq(0).addClass('active');
			$(this).find('li').eq(1).removeClass('active');
		}
		else
		{
			$(this).find('li').eq(0).removeClass('active');
			$(this).find('li').eq(1).addClass('active');			
		}
		
	});
}

function nl2br (str, is_xhtml) 
{   
	str.toString();
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
    return str.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function br2nl (str)
{	
	str.toString();
	var regex = /<br\s*[\/]?>/gi;
	return str.replace(regex, "\n");
}

function br2nothing (str)
{	
	str.toString();
	var regex = /<br\s*[\/]?>/gi;
	return str.replace(regex, '');
}

// allow padding of a string at the start.
// string, character to pad with and max length
function pad (str, chr, max) 
{
  str = str.toString();
  return str.length < max ? pad(chr + str, max) : str;
}

var monthNames = [
	"January", "February", "March",
	"April", "May", "June", "July",
	"August", "September", "October",
	"November", "December"
];

var dayNames = [
	"Sunday", "Monday", "Tuesday", "Wednesday",
	"Thursday", "Friday", "Saturday"
];

// makes the contains function in jquery case insensitive.
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});

// function to reset settings triggered at login.
function reset_at_login()
{
	document.cookie = "hide_alert=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

// show and hide and change text of please wait container
function pleaseWaitMessage(message)
{
	// blank message to clear.
	if (message == '')
		$('.please_wait_container').fadeOut();
	else
	{	
		$('.please_wait_container .please_wait_inner p').text(message);
		$('.please_wait_container').fadeIn();
	}
}

// scroll to a particular div by jquery selector pattern
function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $(id).offset().top},
        'slow');
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function update_messages_count()
{
	$.ajax({
		url : '/messages/get_count',
		type: "GET",
		data : [],
		dataType: 'json',
		processData: false,
		contentType: false,
		success:function(data, textStatus, jqXHR){			
		
			$('.messages_count_container').text(data.count);
			
		},
		error: function(jqXHR, textStatus, errorThrown){
			
			
		}
	});
}