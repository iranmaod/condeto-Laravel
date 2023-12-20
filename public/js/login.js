$(document).ready(function () {
	
	// bind the next step button on the login page.	
	$('.next_step').unbind('click').bind('click',function () {
		$('.login_form').show();
		$(this).hide();
		$('#emaillogin').focus();
	});
	
	$('#RegisterSubmit').on('click',function (e) {
		e.preventDefault();
		registerAttempt();
	});
	
	// click on forgot password link.
	$('.forgot_password').unbind('click').on('click', function (e) {
		
		e.preventDefault();
		$('.login_form,.register_form').hide();
		$('.forgot_password_form').show();		
		$('#forgot_password_email').focus();
		
	});
	
	// click on login link
	$('.signin').unbind('click').on('click', function (e) {
		
		e.preventDefault();
		$('.forgot_password_form,.register_form').hide();
		$('.login_form').show();
		$('#emaillogin').focus();
		
	});
	
	// click on register link
	$('.show_register').unbind('click').on('click', function (e) {
		
		e.preventDefault();
		$('.login_form,.forgot_password_form').hide();
		$('.register_form').show();	
		$('#regemail').focus();		
		
	});
	
	bind_forgot_password_button();
	
	// do we have a username pre stored?
	var username_cookie = getCookie('condeto_username');
	if (username_cookie != '')
	{
		$('#emaillogin').val(username_cookie);
		$('#save_username').prop('checked','checked');
	}
	
	var stay_logged_in = getCookie('condeto_revalidate');
	var stay_logged_in_id = getCookie('condeto_revalidate_id');
	
	if (stay_logged_in != '' && stay_logged_in_id != '')
		autoLoginAttempt(stay_logged_in_id,stay_logged_in);
	
});

function registerAttempt()
{
	// validation. all filled in
	if ($('#regemail').val() == '' || $('#regemail_confirm').val() == '' ||
	$('#regpassword').val() == '' || $('#regpassword_confirmation').val() == '')	
		return triggerRegisterError('Please enter all fields');
	
	// emails match
	if ($('#regemail').val() != $('#regemail_confirm').val())
		return triggerRegisterError('Email address fields do not match');			
	
	// valid email
	if (!validateEmail($('#regemail').val()))
		return triggerRegisterError('Please enter a valid email address');
		
	// psaswords match
	if ($('#regpassword').val() != $('#regpassword_confirmation').val())
		return triggerRegisterError('Your passwords do not match');
		
	var data = $('body').serializeArray();
	data.push({name: "regemail", value: $('#regemail').val()});
	data.push({name: "regpassword", value: $('#regpassword').val()});
	data.push({name: "regpassword_confirmation", value: $('#regpassword_confirmation').val()});
	data.push({name: "regemail_confirm", value: $('#regemail_confirm').val()});		
	
	$.ajaxSetup({async:false});			
	
	$.post("/user/register",
		data
	,
	function(data)
	{			
		if (data.data.result == '200')
		{
			triggerRegistered();
		}
		else
		{
			triggerRegisterError(data.data.message);
		}
		
	}, "json");
	
	$.ajaxSetup({async:true});  //return to default setting		
}

function triggerRegistered()
{
	triggerLoggedIn(false);
}

function triggerRegisterError(message)
{
	$('.registerErrorMessage').html(message);
	$('.loggedInRestricted').fadeOut();
	$('.hideOnLoggedIn,.registerErrorMessage').fadeIn();
	return false;
}

function triggerForgotError(message)
{
	$('.forgotErrorMessage').html(message);	
	$('.forgotErrorMessage').fadeIn();	
	return false;
}

function bind_forgot_password_button()
{
	
	$('#forgot_password_submit').unbind('click').on('click',function (e) {
		e.preventDefault();
		
		// validation. all filled in
		if ($('#forgot_password_email').val() == '')	
			return triggerForgotError('Please enter your email address');
		
		// valid email
		if (!validateEmail($('#forgot_password_email').val()))
			return triggerForgotError('Please enter a valid email address');
		
		$.ajaxSetup({async:false});			
		
		var data = $('body').serializeArray();
		data.push({name: "email_address", value: $('#forgot_password_email').val()});
			
		$.post("/user/forgot_password",
			data
		,
		function(data)
		{
			completeForgotPassword(data);
			
		}, "json");
		
		$.ajaxSetup({async:true});  //return to default setting			
	});
}

function completeForgotPassword(data) 
{
	if (data.data.result == "200")	
		triggerForgotError('Thank you, you should receive a reset link within a few minutes.');	
	else	
		triggerForgotError('We were unable to send the forgot password link.');	
}
