$(document).ready(function()
{
	bind_modals();
});

// sTitle, sBody, sButtons, oObject, CloseCallBack, PassThrough, LoadURL
function x2_modal(args)
{
	// defaults
	if (typeof args.modal === 'undefined')
		args.modal = '#modal_popup';

	if (typeof args.buttons === 'undefined')
		args.buttons = '';

	if (typeof args.title === 'undefined')
		args.title = '';

	if (typeof args.message === 'undefined')
		args.message = '';

	var oModal = $(args.modal);

	// modal popup doesn't exist, clone the dummy
	if(oModal.length == 0)
	{
		oModal = $('#modal_dummy').clone();
		oModal.attr('id',args.modal.replace('#',''));
		oModal.insertAfter($('#modal_dummy'));
	}

	switch(args.type)
	{
		case 'url':
			oModal.find('.modal-body').html('<button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>');

			oModal.find('.modal-body').load(args.url, function()
			{
				// title set in the modal body?
				if(oModal.find('.modal-body > .modal-title').length)
				{
					// fix for just having -
					//if(oModal.find('.modal-body > .modal-title').html().trim() != '')
					//	oModal.find('.modal-title').html(oModal.find('.modal-body > .modal-title').html());

					oModal.find('.modal-body > .modal-title').remove();
				}

				// default
				if(oModal.find('.modal-title').html() == '')
					oModal.find('.modal-title').html('Popup');
			});
			break;
		case 'confirm':
			args.buttons = 'Cancel,Confirm';
			args.message = '<p class="modal-padding">'+args.message+'</p>';
			break;
	}

	oModal.find('.modal-title').html(args.title);
	oModal.find('.modal-body').html(args.message);
	oModal.attr('caller_id', args.caller.id);

	// add validation if it contains a form
	oModal.find('form').validationEngine();

	// add buttons
	if(args.buttons != '')
	{
		var oFooter = oModal.find('.modal-footer');

		oFooter.html(''); // reset buttons

		var buttonsArr = args.buttons.split(",");

		buttonsArr.forEach(function(entry)
		{
			switch(entry)
			{
				case 'Delete':
					oFooter.append('<button class="btn btn-danger btnDelete">Delete</button>').button();
					break;
				case 'Yes':
					oFooter.append('<button class="btn btn-success btnYes">Yes</button>').button();
					break;
				case 'Confirm':
					oFooter.append('<button class="btn btn-success btnConfirm">Confirm</button>').button();
					break;
				case 'OK':
					oFooter.append('<button class="btn btn-success btnOK" data-dismiss="modal">OK</button>').button();
					break;
				case 'No':
					oFooter.append('<button class="btn btn-danger btnNo btnAlignLeft" data-dismiss="modal">No</button>').button();
					break;
				case 'Cancel':
					oFooter.append('<button class="btn btn-danger btnCancel btnAlignLeft" data-dismiss="modal">Cancel</button>').button();
					break;
				case 'Close':
					oFooter.append('<button class="btn btn-default btnClose" data-dismiss="modal">Close</button>').button();
					break;
			}

			// see if we have a click event e.g. confirm_click
			var click_func = eval('args.'+entry.toLowerCase()+'_click');

			if (typeof click_func !== 'undefined')
				oFooter.find('.btn'+entry).click(function(){click_func(args.caller);});
		});
	}

	// activate modal
	oModal.modal();

	// close window events
	if(typeof args.close_event !== 'undefined')
	{

		oModal.on('hidden.bs.modal', function (e) {
			args.close_event();
		});

	}
}

function x2_modal_hide(modal)
{
	// defaults
	if (typeof modal === 'undefined')
		modal = '#modal_popup';

	$(modal).modal('hide');
}

function modal_add_alert(status, message)
{

	var cssClass = status;
	var s_title = "Alert";

	// match bootstrap class
	if(cssClass == "error")
	{
		cssClass = "danger";
		s_title = "Error";
	}

	if (cssClass == "success")
		s_title = "Success";


	var sHTML = '<div class="alert alert-'+ cssClass +'"><p>'+message+'</p></div>';
	console.log(sHTML);

	x2_modal({
			'modal': 'modal_alert',
			'title': s_title,
			'type': 'html',
			'message': sHTML,
			'caller': $(this)
		});

}


function bind_modals(args)
{
	var handler = function(ev)
	{
		ev.preventDefault();

		x2_modal({
			'title': $(this).attr('data-title'),
			'type': 'url',
			'url': $(this).attr('href'),
			'height': $(this).attr('popheight'),
			'width': $(this).attr('popwidth'),
			'caller': $(this)
		});

		return false;
	}

	$(".popup,.popup_uploader").unbind('click');
	$(".popup,.popup_uploader").bind('click',handler);
}


function x2_list_ajax(oObject)
{
	var url = oObject.attr('href');
	var is_toggle = false;

	// on toggle
	if(oObject.find('.fa-toggle-on').length > 0)
	{
		url = $(oObject).data('off-url');
		oObject.removeClass('btn-success').addClass('btn-danger');
		oObject.find('.fa-toggle-on').removeClass('fa-toggle-on').addClass('fa-toggle-off');
		is_toggle = true;
	}
	else if(oObject.find('.fa-toggle-off').length > 0) // off toggle
	{
		url = $(oObject).data('on-url');
		oObject.removeClass('btn-danger').addClass('btn-success');
		oObject.find('.fa-toggle-off').removeClass('fa-toggle-off').addClass('fa-toggle-on');
		is_toggle = true;
	}

	$.get(url, function(data)
	{
 		x2_modal_hide();

		// toggles, dont reload the page
		if(!is_toggle)
			apply_filters();
	});
}
