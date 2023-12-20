//From inline

if ($('#modal_popup').length > 0)
{
    var caller_ref = $('#modal_popup').attr('caller_id').replace("btn_","");

    if ($('#'+caller_ref+'_show_add_button').val() == '0')
        $('.btn_add_new_category').hide();

    //$('#modal_popup').find('.modal-title').html($('#'+caller_ref+'_popup_title').val());
}

var datatable_loaded = function(DataTableObject) {
    after_table_loaded_actions(DataTableObject);
};

//From inline

var disable_autoscroll = false;

function is_from_selector()
{
if ($("#group_settings").attr('data-from_selector') == "1")
    return true;
else
    return false;
}

function allow_multiple_selection()
{
if ($("#group_settings").attr('data-allow_multiple') == "1")
    return true;
else
    return false;
}

function group_select_init()
{

$('.search_area_row:first .search_area_equation').val('CON').trigger('change');

// no colon or pipe
$('#filter_text').keydown(function (e) {
    if (e.key == ':' || e.key == '|') {
        e.preventDefault();
        return false;
    }
});

$('#filter_text').keyup(function() {

    // set filter field to data-search-field attr of caller_id of button

    var search_field = $('#'+$('#modal_popup').attr('caller_id')).attr('data-search-field');

    if (search_field == '')
        search_field = 'group_name';

    $('.search_area_row:first .search_area_field').val(search_field).trigger('change');

    //For popup text search field set the first row in the advanced search.. hidden in popup.
    $('.search_area_row:first .search_area_text').val($(this).val());

    apply_filters();

});

$('.btn_add_new_category').unbind('click').click(function ()
{
    if ($('#filter_text').val() == "")
        return;

    $.post(x2_admin_url + '/Groups/create_group',
    {
        parent_group_id:$('#group_type_id').val(),
        group: $('#filter_text').val()
    },
    function(data)
    {
        apply_filters();
    });

});

}

//Returns the group selection removing duplicates to the caller block. then rebuilds hidden field with csv of groups..
function return_group_selection(caller)
{
var caller_id = caller.id;
var field_reference = caller_id.replace("btn_","");

//Run checks on the currently selected ones and remove them from this list before we append to the master list..
$('.modal .selected_group_area .group_selection').each(function() {
    if ($('#group_selector_block_'+field_reference).find('.group_selection_' + $(this).attr('data-id')).length > 0)
        $(this).remove();
});

var append_obj = $('.modal .selected_group_area');

if ($('#group_selector_block_'+field_reference).hasClass('dnd_enabled'))
{
    append_obj.find('.group_selection').each(function() {

        $(this).attr("draggable", "true");
        $(this).attr("data-drag_group", field_reference);
    });
}

$('#group_selector_block_'+field_reference+' .selected_group_area').append(append_obj.html());

// rebuild dnd events
set_drag_events(field_reference);

rebuild_group_selection_id_field(field_reference);

var oModal = $('#modal_popup');
oModal.modal('hide');
}

// Pass the field name to this function to re calculate the groups selected.
function rebuild_group_selection_id_field(field_reference)
{

var return_ids = [];
var counter = 0;

$('#group_selector_block_'+field_reference).find('.group_selection').each(function() {

    return_ids[counter] = $(this).attr('data-id');
    counter++;

});

$('#group_selector_block_'+field_reference).find('.result_ids').val(return_ids.join('||'));

$('#'+field_reference).trigger('change');
}

//click event for removing the selection from the listing at the top..
function remove_selection_from_list(selected_object)
{
//Get the parent grouping block before object is removed and not longer available.
var gs_block = $(selected_object).closest('.group_selector_block');
var parent_object = $(selected_object).closest('.group_selection');

$(parent_object).fadeOut(300, function()
{
    $(this).remove();

    //Reload based on the selected objects parent container name. but only called from main window not popup...
    rebuild_group_selection_id_field($(gs_block).attr('id').replace('group_selector_block_',''));
});

}

//run events after the table has loaded its new data set.
function after_table_loaded_actions(datatable)
{
//Bind the buttons for selecting to assign new entry to the list.
$(datatable).find('.btn-success').unbind('click');
$(datatable).find('.btn-success').click(function() {

    var table_row = $(this).closest('tr');

    //To do - check if it is already in the list and assign proper id's which aren't currently in the data table.
    if ($('.modal .selected_group_area').find('.group_selection_'+$(this).attr('data-id')).length <= 0)
        $('.modal .selected_group_area').append(generate_group_block_html($(this).attr('data-id'), $(this).attr('data-title'),''));

    return false;

});

var caller_ref = $('#modal_popup').attr('caller_id').replace("btn_","");

if ($('#'+caller_ref+'_show_add_button').val() == '0')
    $('.btn_add_new_category').hide();
}

$(document).ready(function() {
group_select_init();
});

if (is_from_selector())
group_select_init();