var debounce = function(func, wait, immediate) {
    var timeout, result;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) result = func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) result = func.apply(context, args);
      return result;
    };
  }
  
  function popupAjaxForm(oForm)
  {
      $(oForm).submit(function(e)
      {
          e.preventDefault();
      });
  
      // validate
      if(!$(oForm).validationEngine('validate'))
          return false;
  
      $(oForm).ajaxSubmit({
          success: function(data)
          {
              modal_add_alert(data.result, data.message);
  
              if(data.result == 'success')
              {
                  $(oForm).clearForm();
              }
          }
      });
  }
  
  function pagesize(){
      if($(window).width() >= 765){
        $("body").removeClass("mobilescreen").addClass("bigscreen");
        $(".left_navigation #nav").slideDown(350);
      }
      else{
        $("body").addClass("mobilescreen").removeClass("bigscreen");
        $(".left_navigation #nav").slideUp(350);
      }
  }
  
  
  var TO = false;
  
  $(document).ready(function(){
  
      setInterval('updateClock()', 1000);
  
      pagesize();
      $(window).resize(debounce(pagesize,100));
  
       $(".content #nav a").on('click',function(e){
            if(!$(this).parents(".content:first").hasClass("enlarged")){
  
                if($(this).attr('href') == '') {
                  e.preventDefault();
                }
  
                if(!$(this).hasClass("subdrop")) {
                  $("ul",$(this).parents("ul:first")).slideUp(350);
                  $("a",$(this).parents("ul:first")).removeClass("subdrop");
                  $("#nav .pull-right i").removeClass("fa-chevron-down").addClass("fa-chevron-left");
  
                  $(this).next("ul").slideDown(350);
                  $(this).addClass("subdrop");
                  $(".pull-right i",$(this).parents(".has_sub:last")).removeClass("fa-chevron-left").addClass("fa-chevron-down");
                  $(".pull-right i",$(this).siblings("ul")).removeClass("fa-chevron-down").addClass("fa-chevron-left");
                }else if($(this).hasClass("subdrop")) {
                  $(this).removeClass("subdrop");
                  $(this).next("ul").slideUp(350);
                  $(".pull-right i",$(this).parent()).removeClass("fa-chevron-down").addClass("fa-chevron-left");
                }
            }
        });
        $("#nav > li.has_sub > a.open").addClass("subdrop").next("ul").show();
  
        $(".menubutton").click(function(){
          $('.collapseMenuOption').hide();
            if(!$(".content").hasClass("enlarged")){
                $("#nav .has_sub ul").removeAttr("style");
                $("#nav .has_sub .pull-right i").removeClass("fa-chevron-left").addClass("fa-chevron-down");
                $("#nav ul .has_sub .pull-right i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
                $(".content").addClass("enlarged");
                setTimeout(function() {$('.collapseMenuOption').fadeIn(300);
                  $('.collapseMenuOption').find('.colTxt').html('Expand');
                  },50);
            }else{
                $("#nav .has_sub .pull-right i").addClass("fa-chevron-left").removeClass("fa-chevron-down").removeClass("fa-chevron-right");
                $(".content").removeClass("enlarged");
                setTimeout(function() {$('.collapseMenuOption').fadeIn(300);
                $('.collapseMenuOption').find('.colTxt').html('Collapse');},50);
            }
  
        });
  
        $(".left_navigation-dropdown a").on('click',function(e){
            e.preventDefault();
  
            if(!$(this).hasClass("open")) {
              $(".left_navigation #nav").slideUp(350);
              $(".left_navigation-dropdown a").removeClass("open");
  
              $(".left_navigation #nav").slideDown(350);
              $(this).addClass("open");
            }
  
            else if($(this).hasClass("open")) {
              $(this).removeClass("open");
              $(".left_navigation #nav").slideUp(350);
            }
        });
  
        $('.debug').on('click',function(e)
        {
          $('html, body').animate({
              scrollTop: $(this).offset().top
          }, 2000);
        });
  
  
      $.ajaxSetup({ cache: false });
      $("form").validationEngine();
      
      $('.optgroup_filters').each(function () {
          if ($(this).children().length < 1)
              $(this).remove();		
      });
  
      prepare_popup_calls();
      populate_groups_from_inital_load();
      
      if (typeof $.fn.chosen !== 'undefined')
          $('.chosen-select').chosen();
      
  });
  
  function generate_group_block_html(group_id, group_text, drag_group)
  {
      if(group_id == '')
          return '';
  
      var drag_attributes = '';
      var edit_cms_html = '';
  
      if (drag_group != '')
          drag_attributes = ' draggable="true" data-drag_group="'+drag_group+'" ';
  
      if (drag_group == 'child_cms')
          edit_cms_html = '<i class="fa fa-pencil" title="Edit" onclick="window.open(\''+x2_admin_url+'/Article/edit/'+group_id+'\',\'_blank\');"></i>'
  // or same window / tab
  //		edit_cms_html = '<i class="fa fa-pencil" onclick="window.location.href = \''+x2_admin_url+'/Article/edit/'+group_id+'\'"></i>'
  
      var new_html = '<div class="group_selection group_selection_' + group_id + '" data-id="' + group_id + '" data-title="' + group_text + '" '+drag_attributes+'><span class="remove_group">' + group_text + ' ' + edit_cms_html + ' <i class="fa fa-close" title="Remove" onclick="remove_selection_from_list($(this));return false;"></i></span></div>';
  
      return new_html;
  
  }
  
  function populate_groups_from_inital_load()
  {
      $('.group_selector_block').each(function() {
  
          drag_group = $(this).attr('id').replace("group_selector_block_","");
  
          if ($(this).find('.result_initial').val() != "")
          {
              var data_list = $(this).find('.result_initial').val().split('||');
              for (index = 0; index < data_list.length; ++index) {
  
                  var element = data_list[index].split('&&');
                  var html = generate_group_block_html(element[0], element[1], drag_group);
                  $(this).find('.selected_group_area').append(html);
  
              }
  
              if ($(this).hasClass('dnd_enabled'))
                  set_drag_events(drag_group);
  
          }
      });
  }
  
  
  function prepare_popup_call(selector,url,dont_use_conditions)
  {
      $(selector).unbind('click').click(function() {
          
          
          var btn_caller = $(this).attr('id').replace("btn_","");
          var popup_title = $(this).closest('.group_selector_block').find('#'+btn_caller+'_popup_title').val();
          
          var finalurl = x2_admin_url+'/popup/' + url + '/Select/';
          
          if (dont_use_conditions)
              finalurl = finalurl + $(this).attr('data-group-id')+'/'+$(this).attr('data-group-hidden');
          else
              finalurl = finalurl + $(this).attr('data-conditions');		
          
          x2_modal({
              'title': popup_title,
              'message': '',
              'type': 'url',
              'url': finalurl,
              'caller': this,
              'buttons':'Cancel,Confirm',
              'confirm_click': function (caller) {return_group_selection(caller)}
          });
      });
  }
  
  function prepare_popup_calls()
  {
          
      prepare_popup_call('.group_selector_btn','Groups',true);
      prepare_popup_call('.user_selector_btn','Users',false);
      prepare_popup_call('.org_selector_btn','Customers',false);
      prepare_popup_call('.cms_selector_btn','cms',false);
      prepare_popup_call('.doc_selector_btn','Documents',false);	
  
      //media is slightly different so handled seperately. 
      $('.media_selector').unbind('click').click(function() {
          var multiple_select = 0;
          if ($(this).attr('data-multiple') == "1")
              multiple_select = 1;
          
          var btn_caller = $(this).attr('id').replace("btn_","");
          var popup_title = $(this).closest('.group_selector_block').find('#'+btn_caller+'_popup_title').val();
  
          x2_modal({
              'title': popup_title,
              'message': '',
              'type': 'url',
              'url': x2_admin_url + '/popup/MediaManager?multiple_select='+multiple_select+'&media_type='+$(this).attr('data-type'),
              'caller': this,
              'buttons':'Cancel,Confirm',
              'confirm_click': function (caller) {return_media(caller)}
          });
      });
  
  }
  
  $(".totop").hide();
  
  $(function(){
      $(window).scroll(function(){
          if ($(this).scrollTop()>300)
          {
              $('.totop').slideDown();
          }
          else
          {
              $('.totop').slideUp();
          }
      });
  
      $('.totop a').click(function (e) {
          e.preventDefault();
          $('body,html').animate({scrollTop: 0}, 500);
      });
  
  });
  
  $('.modal').appendTo($('body'));
  
  function updateClock ( )
  {
      var utc_offset = parseInt($("#clock").attr('utc_offset'));
  
      if (utc_offset != 0)
          currentMoment = moment().utc().add(utc_offset,'seconds');
      else
          currentMoment = moment();
  
      $("#clock").html(currentMoment.format('h:mm:ss A'));
  }
  
  
  /* widget close */
  
  $('.wclose').click(function(e){
    e.preventDefault();
    var $wbox = $(this).parent().parent().parent();
    $wbox.hide(100);
  });
  
  
  function load_widget_settings()
  {
      var cache_value = $.jStorage.get($.md5(location.pathname)+"_widgets");
  
      if (cache_value != '')
      {
          console.log(cache_value);
      }
  }
  
  function save_widget_setting(widget, setting, value)
  {
      var page_id = $.md5(location.pathname)+"_widgets";
      var cache_value = $.jStorage.get(page_id);
  
      if (cache_value)
      {
          var widget_json = $.parseJSON(cache_value);
      }
      else
      {
          var widget_json = $.parseJSON('[]');
      }
  }
  
  
  
  
  /* widget minimize */
  
    $('.wminimize').click(function(e){
      e.preventDefault();
  
      var wcontent = $(this).parent().parent().next('.widget-content');
  
      if (wcontent.hasClass('hidden'))
      {
          wcontent.removeClass('hidden');
          return;
      }
  
      if(wcontent.is(':visible'))
      {
          //save_widget_setting($(this).closest('.widget').attr('id'),'minimize','on');
          $(this).children('i').removeClass('fa-chevron-up');
          $(this).children('i').addClass('fa-chevron-down');
      }
      else
      {
          //save_widget_setting($(this).closest('.widget').attr('id'),'minimize','off');
          $(this).children('i').removeClass('fa-chevron-down');
          $(this).children('i').addClass('fa-chevron-up');
      }
  
      wcontent.slideToggle(300);
    });
  
  
  // html5 drag n drop stuff
  
  var drag_source_object = null;
  var drag_objects = {};
  
  function set_drag_events(field_reference)
  {
      // drag_objects by field_reference
  
      drag_objects[field_reference] = document.querySelectorAll('#group_selector_block_'+field_reference+' .group_selection');
  
      [].forEach.call(drag_objects[field_reference], function(drag_object) {
        drag_object.addEventListener('dragstart', handleDragStart, false);
        drag_object.addEventListener('dragenter', handleDragEnter, false);
        drag_object.addEventListener('dragover', handleDragOver, false);
        drag_object.addEventListener('dragleave', handleDragLeave, false);
        drag_object.addEventListener('drop', handleDrop, false);
        drag_object.addEventListener('dragend', handleDragEnd, false);
      });
  }
  
  
  function handleDragStart(e)
  {
      this.style.opacity = '0.4';  // this / e.target is the source node.
  
      drag_source_object = this;
  
      e.dataTransfer.effectAllowed = 'move';
      e.dataTransfer.setData('text/html', this.outerHTML);
  }
  
  function handleDragOver(e)
  {
      if (e.preventDefault) {
          e.preventDefault(); // Necessary. Allows us to drop.
      }
  
      e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
  
      return false;
  }
  
  function handleDragEnter(e)
  {
      if (drag_source_object.getAttribute("data-drag_group") == this.getAttribute("data-drag_group"))
      {
  
          // this / e.target is the current hover target.
          this.classList.add('drag_over');
      }
  }
  
  function handleDragLeave(e)
  {
      this.classList.remove('drag_over');  // this / e.target is previous target element.
  }
  
  function handleDrop(e)
  {
    // this / e.target is current target element.
  
      if (e.stopPropagation) {
      e.stopPropagation(); // stops the browser from redirecting.
      }
  
      // Don't do anything if dropping the same object we're dragging
      // and check in same drag group as target
      if (drag_source_object != this && drag_source_object.getAttribute("data-drag_group") == this.getAttribute("data-drag_group"))
      {
          // Set the source object's HTML to the HTML of the object we dropped on.
          drag_source_object.outerHTML = this.outerHTML;
          this.outerHTML = e.dataTransfer.getData('text/html');
  
          // reset handlers for this group
          set_drag_events(drag_source_object.getAttribute("data-drag_group"));
      }
  
      return false;
  }
  
  function handleDragEnd(e)
  {
    // this/e.target is the source node.
  
      var field_reference = e.target.getAttribute("data-drag_group");
  
      [].forEach.call(drag_objects[field_reference], function (drag_object) {
          drag_object.classList.remove('drag_over');
          drag_object.style.opacity = '1.0';
      });
  
      // rebuild result_ids
      rebuild_group_selection_id_field(field_reference);
  }
  
  
  function htmlEncode(text)
  {
      if (typeof text === 'undefined' || text === null )
          return '';
  
      ampRegex = /&/g;
      gtRegex = />/g;
      ltRegex = /</g;
  
      return String( text ).replace( ampRegex, '&amp;' ).replace( gtRegex, '&gt;' ).replace( ltRegex, '&lt;' );
  }