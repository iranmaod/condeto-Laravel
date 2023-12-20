/* 	Document ready function to remain at the top of the page for ease of use. All document ready calls should be within this one keeping a singular call for any generic functions required.  */

$( document ).ready(function () {
	html5_compatibility();
	prepare_csrf();
	prepare_scroll_to_top();
	jQuery.browser = {};
	jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
	jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());	
	if (jQuery.browser.webkit)
		$('body').addClass('webkit');
	else
		$('body').addClass('nowebkit');

});

// check to see if an attribute exists
$.fn.hasAttr = function(name) {
   return this.attr(name) !== undefined;
};

/* 	End Document Ready Section */


function htmlDecode(input){
  var e = document.createElement('div');
  e.innerHTML = input;
  return e.childNodes[0].nodeValue;
}

/* 	Plugins are stored within this plugin area and is to be purely plugin based rather than the standard function call. */

// Avoid `console` errors in browsers that lack a console.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

// Begin $.MD5 plugin
// Jquery version of the MD5 implementation allowing the call $.MD5();
(function ($) {
	'use strict';

	/*
* Add integers, wrapping at 2^32. This uses 16-bit operations internally
* to work around bugs in some JS interpreters.
*/
	function safe_add(x, y) {
		var lsw = (x & 0xFFFF) + (y & 0xFFFF),
			msw = (x >> 16) + (y >> 16) + (lsw >> 16);
		return (msw << 16) | (lsw & 0xFFFF);
	}

	/*
* Bitwise rotate a 32-bit number to the left.
*/
	function bit_rol(num, cnt) {
		return (num << cnt) | (num >>> (32 - cnt));
	}

	/*
* These functions implement the four basic operations the algorithm uses.
*/
	function md5_cmn(q, a, b, x, s, t) {
		return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s), b);
	}
	function md5_ff(a, b, c, d, x, s, t) {
		return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
	}
	function md5_gg(a, b, c, d, x, s, t) {
		return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
	}
	function md5_hh(a, b, c, d, x, s, t) {
		return md5_cmn(b ^ c ^ d, a, b, x, s, t);
	}
	function md5_ii(a, b, c, d, x, s, t) {
		return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
	}

	/*
* Calculate the MD5 of an array of little-endian words, and a bit length.
*/
	function binl_md5(x, len) {
		/* append padding */
		x[len >> 5] |= 0x80 << ((len) % 32);
		x[(((len + 64) >>> 9) << 4) + 14] = len;

		var i, olda, oldb, oldc, oldd,
			a = 1732584193,
			b = -271733879,
			c = -1732584194,
			d = 271733878;

		for (i = 0; i < x.length; i += 16) {
			olda = a;
			oldb = b;
			oldc = c;
			oldd = d;

			a = md5_ff(a, b, c, d, x[i], 7, -680876936);
			d = md5_ff(d, a, b, c, x[i + 1], 12, -389564586);
			c = md5_ff(c, d, a, b, x[i + 2], 17, 606105819);
			b = md5_ff(b, c, d, a, x[i + 3], 22, -1044525330);
			a = md5_ff(a, b, c, d, x[i + 4], 7, -176418897);
			d = md5_ff(d, a, b, c, x[i + 5], 12, 1200080426);
			c = md5_ff(c, d, a, b, x[i + 6], 17, -1473231341);
			b = md5_ff(b, c, d, a, x[i + 7], 22, -45705983);
			a = md5_ff(a, b, c, d, x[i + 8], 7, 1770035416);
			d = md5_ff(d, a, b, c, x[i + 9], 12, -1958414417);
			c = md5_ff(c, d, a, b, x[i + 10], 17, -42063);
			b = md5_ff(b, c, d, a, x[i + 11], 22, -1990404162);
			a = md5_ff(a, b, c, d, x[i + 12], 7, 1804603682);
			d = md5_ff(d, a, b, c, x[i + 13], 12, -40341101);
			c = md5_ff(c, d, a, b, x[i + 14], 17, -1502002290);
			b = md5_ff(b, c, d, a, x[i + 15], 22, 1236535329);

			a = md5_gg(a, b, c, d, x[i + 1], 5, -165796510);
			d = md5_gg(d, a, b, c, x[i + 6], 9, -1069501632);
			c = md5_gg(c, d, a, b, x[i + 11], 14, 643717713);
			b = md5_gg(b, c, d, a, x[i], 20, -373897302);
			a = md5_gg(a, b, c, d, x[i + 5], 5, -701558691);
			d = md5_gg(d, a, b, c, x[i + 10], 9, 38016083);
			c = md5_gg(c, d, a, b, x[i + 15], 14, -660478335);
			b = md5_gg(b, c, d, a, x[i + 4], 20, -405537848);
			a = md5_gg(a, b, c, d, x[i + 9], 5, 568446438);
			d = md5_gg(d, a, b, c, x[i + 14], 9, -1019803690);
			c = md5_gg(c, d, a, b, x[i + 3], 14, -187363961);
			b = md5_gg(b, c, d, a, x[i + 8], 20, 1163531501);
			a = md5_gg(a, b, c, d, x[i + 13], 5, -1444681467);
			d = md5_gg(d, a, b, c, x[i + 2], 9, -51403784);
			c = md5_gg(c, d, a, b, x[i + 7], 14, 1735328473);
			b = md5_gg(b, c, d, a, x[i + 12], 20, -1926607734);

			a = md5_hh(a, b, c, d, x[i + 5], 4, -378558);
			d = md5_hh(d, a, b, c, x[i + 8], 11, -2022574463);
			c = md5_hh(c, d, a, b, x[i + 11], 16, 1839030562);
			b = md5_hh(b, c, d, a, x[i + 14], 23, -35309556);
			a = md5_hh(a, b, c, d, x[i + 1], 4, -1530992060);
			d = md5_hh(d, a, b, c, x[i + 4], 11, 1272893353);
			c = md5_hh(c, d, a, b, x[i + 7], 16, -155497632);
			b = md5_hh(b, c, d, a, x[i + 10], 23, -1094730640);
			a = md5_hh(a, b, c, d, x[i + 13], 4, 681279174);
			d = md5_hh(d, a, b, c, x[i], 11, -358537222);
			c = md5_hh(c, d, a, b, x[i + 3], 16, -722521979);
			b = md5_hh(b, c, d, a, x[i + 6], 23, 76029189);
			a = md5_hh(a, b, c, d, x[i + 9], 4, -640364487);
			d = md5_hh(d, a, b, c, x[i + 12], 11, -421815835);
			c = md5_hh(c, d, a, b, x[i + 15], 16, 530742520);
			b = md5_hh(b, c, d, a, x[i + 2], 23, -995338651);

			a = md5_ii(a, b, c, d, x[i], 6, -198630844);
			d = md5_ii(d, a, b, c, x[i + 7], 10, 1126891415);
			c = md5_ii(c, d, a, b, x[i + 14], 15, -1416354905);
			b = md5_ii(b, c, d, a, x[i + 5], 21, -57434055);
			a = md5_ii(a, b, c, d, x[i + 12], 6, 1700485571);
			d = md5_ii(d, a, b, c, x[i + 3], 10, -1894986606);
			c = md5_ii(c, d, a, b, x[i + 10], 15, -1051523);
			b = md5_ii(b, c, d, a, x[i + 1], 21, -2054922799);
			a = md5_ii(a, b, c, d, x[i + 8], 6, 1873313359);
			d = md5_ii(d, a, b, c, x[i + 15], 10, -30611744);
			c = md5_ii(c, d, a, b, x[i + 6], 15, -1560198380);
			b = md5_ii(b, c, d, a, x[i + 13], 21, 1309151649);
			a = md5_ii(a, b, c, d, x[i + 4], 6, -145523070);
			d = md5_ii(d, a, b, c, x[i + 11], 10, -1120210379);
			c = md5_ii(c, d, a, b, x[i + 2], 15, 718787259);
			b = md5_ii(b, c, d, a, x[i + 9], 21, -343485551);

			a = safe_add(a, olda);
			b = safe_add(b, oldb);
			c = safe_add(c, oldc);
			d = safe_add(d, oldd);
		}
		return [a, b, c, d];
	}

	/*
* Convert an array of little-endian words to a string
*/
	function binl2rstr(input) {
		var i,
			output = '';
		for (i = 0; i < input.length * 32; i += 8) {
			output += String.fromCharCode((input[i >> 5] >>> (i % 32)) & 0xFF);
		}
		return output;
	}

	/*
* Convert a raw string to an array of little-endian words
* Characters >255 have their high-byte silently ignored.
*/
	function rstr2binl(input) {
		var i,
			output = [];
		output[(input.length >> 2) - 1] = undefined;
		for (i = 0; i < output.length; i += 1) {
			output[i] = 0;
		}
		for (i = 0; i < input.length * 8; i += 8) {
			output[i >> 5] |= (input.charCodeAt(i / 8) & 0xFF) << (i % 32);
		}
		return output;
	}

	/*
* Calculate the MD5 of a raw string
*/
	function rstr_md5(s) {
		return binl2rstr(binl_md5(rstr2binl(s), s.length * 8));
	}

	/*
* Calculate the HMAC-MD5, of a key and some data (raw strings)
*/
	function rstr_hmac_md5(key, data) {
		var i,
			bkey = rstr2binl(key),
			ipad = [],
			opad = [],
			hash;
		ipad[15] = opad[15] = undefined;
		if (bkey.length > 16) {
			bkey = binl_md5(bkey, key.length * 8);
		}
		for (i = 0; i < 16; i += 1) {
			ipad[i] = bkey[i] ^ 0x36363636;
			opad[i] = bkey[i] ^ 0x5C5C5C5C;
		}
		hash = binl_md5(ipad.concat(rstr2binl(data)), 512 + data.length * 8);
		return binl2rstr(binl_md5(opad.concat(hash), 512 + 128));
	}

	/*
* Convert a raw string to a hex string
*/
	function rstr2hex(input) {
		var hex_tab = '0123456789abcdef',
			output = '',
			x,
			i;
		for (i = 0; i < input.length; i += 1) {
			x = input.charCodeAt(i);
			output += hex_tab.charAt((x >>> 4) & 0x0F) +
				hex_tab.charAt(x & 0x0F);
		}
		return output;
	}

	/*
* Encode a string as utf-8
*/
	function str2rstr_utf8(input) {
		return unescape(encodeURIComponent(input));
	}

	/*
* Take string arguments and return either raw or hex encoded strings
*/
	function raw_md5(s) {
		return rstr_md5(str2rstr_utf8(s));
	}
	function hex_md5(s) {
		return rstr2hex(raw_md5(s));
	}
	function raw_hmac_md5(k, d) {
		return rstr_hmac_md5(str2rstr_utf8(k), str2rstr_utf8(d));
	}
	function hex_hmac_md5(k, d) {
		return rstr2hex(raw_hmac_md5(k, d));
	}

	$.md5 = function (string, key, raw) {
		if (!key) {
			if (!raw) {
				return hex_md5(string);
			} else {
				return raw_md5(string);
			}
		}
		if (!raw) {
			return hex_hmac_md5(key, string);
		} else {
			return raw_hmac_md5(key, string);
		}
	};

}(typeof jQuery === 'function' ? jQuery : this));
// End MD5 Plugin

/* 	End Plugins Section */


/* 	Functions are stored within this function area and is to be purely functions.  */

//Function to detect if a json input string is valid.
function is_valid_json(input_string)
{
	if (/^[\],:{}\s]*$/.test(input_string.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, '')))
		return true;
	else
		return false;
}

// Function to determine the format of a passed object
function determine_format(object)
{
	var stringConstructor = "test".constructor;
	var arrayConstructor = [].constructor;
	var objectConstructor = {}.constructor;

	if (object === null) {
		return "null";
	}
	else if (object === undefined) {
		return "undefined";
	}
	else if (object.constructor === stringConstructor) {
		return "string";
	}
	else if (object.constructor === arrayConstructor) {
		return "array";
	}
	else if (object.constructor === objectConstructor) {
		return "object";
	}
	else {
		return "unknown";
	}
}

//Function to check for CSRF token and insert into forms.
function prepare_csrf()
{
	var TokenValue;
	if ($('#csrf').length > 0)
	{
		TokenValue = $('#csrf').val();
		$('form').each(function() {
			$(this).prepend('<input type="hidden" name="csrf" value="'+TokenValue+'" />');
		});
	}
}

// HTML 5 Specific function Start
function html5_compatibility()
{
	var html_5_number = false;
	var html_5_date = false;
	var html_5_placeholder = false;

	try
	{
		if ($('input[type=date]').length > 0 && Modernizr.inputtypes.date)
			html_5_date = true;
		if ($('input[type=number]').length > 0 && Modernizr.inputtypes.number)
			html_5_number = true;
		if (Modernizr.input.placeholder)
			html_5_placeholder = true;
	}
	catch(err)
	{

	}

	//only call jquery ui load on elements requiring it..
	if (!html_5_date)
	{
		if (typeof jQuery.ui != 'undefined') {

			setup_date_time_picker();

		}
	}

	if (!html_5_number && false) // todo, disabled
	{
		if (typeof jQuery.ui != 'undefined')
		{
			$('input[type=number]').spinner();
		}
	}

	// not html5, add place holders
	if (!html_5_placeholder)
	{
		$('input,textarea').each(function () {
			if ($(this).attr('placeholder') != "")
			{
				$(this).data('defaultValue',$(this).attr('placeholder'));
			}
			else
			{
				$(this).data('defaultValue',$(this).val());
			}
			$(this).focus(function() {
				if ($(this).val() == $(this).data('defaultValue'))
					$(this).val('');
			});

			$(this).blur(function() {
				if ($(this).val() == '')
					$(this).val($(this).data('defaultValue'));
			});
		});
	}
}

// HTML 5 Specific function End

function setup_date_time_picker()
{
	$('input[type=datetime]').datetimepicker({
	  icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-sun-o',
			clear: 'fa fa-ban'
		},
		format: 'YYYY-MM-DD HH:mm'
	});

	$('input[type=date]').datetimepicker({
	  icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-sun-o',
			clear: 'fa fa-ban'
		},
		format: 'YYYY-MM-DD'
	});

	$('.date, .datetime').find('.form-control').unbind('focus').focus(function()
	{
		$(this).data("DateTimePicker").show();
	});

}

function is_script_already_included(src)
{
	var scripts = document.getElementsByTagName("script");
	for(var i = 0; i < scripts.length; i++)
	   if(scripts[i].getAttribute('src') == src) return true;
	return false;
}

function exists_in_select(select_source, select_value)
{	
	var FunctionResult = false;	
	$(select_source + ' option').each(function(){		
		if (this.value == select_value)
			FunctionResult = true;
	});
	return FunctionResult;
}

function prepare_scroll_to_top()
{
	$(".scroll_to_top").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
	});
}
/* 	End Functions Section */

/* 	Event Handler and attachements here */

/*

Attach Ajax event handler for any .ajax requests to help deal with caching.
ajax call as follows

$.ajax({
		url: '/public/default/ajax_sample.php',
		data: {"param1":"bvalue"},
		complete: load_wall_data, 					// This is your function that will receive the data and process it.
		cache_time: 10000 							// If you set this parameter your request will be cached for specified MS. if not send or 0 no expiry time will be set.
		force_refresh: true			 				// This will force the request to load from AJAX no matter what cache times are set if set to true. Dont sent or set to false to use standard cache logic.,
	});
*/

$( document ).ajaxSend(function( event, jqXHR, settings )
{
	if(settings.cache == true)
		return;

	var page_request = settings.url;  											// page_request is the url request. Pending change for more specifics includin gparameters etc....
	settings.original_page = page_request;										// for referenceing purposes after the url is modified for caching references
	var perform_call = false;  													// by default lets not perform ajax.
	settings.from_cache = false;												// Set a new ajax settings variable for checking on later.

	var cache_ref_value = $.jStorage.get($.md5(page_request+"_cache_ref"));			// is there a reference for this request in cache? if so we should get it and send it with the request.. if not just check for standard cache..
	if(cache_ref_value)
	{
		perform_call = true;													// We will always call the ajax but need to attach reference.
		if (page_request.indexOf('?') > -1)										// Tag data to the url for sending
			settings.url = page_request+'&cache_ref=' + cache_ref_value;
		else
			settings.url = page_request+'?cache_ref=' + cache_ref_value;
	}

	if ($('#csrf').length > 0) 													// Check for the existance of the CSRF Token and tag it on it found.
		if (settings.url.indexOf('?') > -1)										// Tag data to the url for sending
			settings.url = settings.url+'&csrf=' + $('#csrf').val();
		else
			settings.url = settings.url+'?csrf=' + $('#csrf').val();

	if (settings.url.indexOf('?') > -1)										// Tag data to the url for sending
		settings.url = settings.url+'&ajax=true';
		else
			settings.url = settings.url+'?ajax=true';
		
	var cache_value = $.jStorage.get($.md5(page_request));								// Get cache value from local storage
	if(!cache_value || settings.force_refresh)									// If there is no cache value update or force refresh the perform call and let the request pass
		perform_call = true;

	if (!perform_call)															// if there is a cache version update from_cache setting, set response text to cache and abort the request.
	{																			// This does trigger a failed procedure if one is specified so if required check for the existance of the from_cache to determine a real failure or not.
		settings.from_cache = true;
		jqXHR.responseText = cache_value;
		jqXHR.abort();
	}

});

function check_ajax_response(xhr)
{
	if (xhr.status == 403)
	{		
		x2_modal({
			'title': 'Please Log In',
			'message': '',
			'type': 'url',
			'url': '/signin_page_inline',
			'caller': this,
			'buttons':'OK'
		});
	}
}

$(document).ajaxError(function (e, xhr, settings) {
	check_ajax_response(xhr)
});

// Attach Ajax event handler for any .ajax success to help deal with caching.
$( document ).ajaxComplete(function( event, xhr, settings )
{	
	
	if (settings.from_cache)
	{
		if (determine_format(xhr.responseText.trim()) == "object"){					// If it is from the cache.. check the responsetext as it could be a json object. if it is assign responseJSON
			xhr.responseJSON = xhr.responseText.trim();
		}
		try
		{
			settings.complete(xhr,'success');
		}
		catch(e)
		{}
	}
	else
	{
		if (is_valid_json(xhr.responseText.trim()) && xhr.responseText.trim() != "")									// check for existence of reference to determin if we are storing more than just the response... if valid json...
		{
			var data = xhr.responseJSON;
			if (typeof data !== "undefined" && data.cache_ref)													// if cache_ref is sent back in the data store in local storage. keeping it in a seperate placeholder for ease of access.
			{
				$.jStorage.set($.md5(settings.original_page+'_cache_ref'),data.cache_ref);
				if (settings.cache_time && settings.cache_time > 0)
					$.jStorage.setTTL($.md5(settings.original_page+'_cache_ref'),settings.cache_time);
			}
			$.jStorage.set($.md5(settings.url),xhr.responseJSON);							// Always store the response json.
		}
		else
		{
			$.jStorage.set($.md5(settings.url),xhr.responseText.trim());							// Always store the response text.
		}

		if (settings.cache_time && settings.cache_time > 0)
			$.jStorage.setTTL($.md5(settings.url),settings.cache_time);
	}

});

/* 	End Event Handler and attachements Section */
