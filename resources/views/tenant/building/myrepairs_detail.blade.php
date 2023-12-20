
@extends('tenant.index')
@section('title')
Repair Details
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Repair Details</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	    

    <div class="container repairs_details message_detail " data-type="message_event" data-object_id="324" data-page_count="1" data-per_page="5">
        
        <h2><img src="{{asset('img/event.png')}}" /> {{$repair_detail->description}} - {{ date('d F Y', strtotime($repair_detail->create_time))  }} - Repair Request
            </h2>
    
        <div id="page_selection" class="page_selection"></div>
        <div class="messages_container">
            <div id="messages_list" class="messages_list">
        <ul>
            @foreach($message as $item)

            <li>
                <div class="outer_message_container" data-message_id="4614" data-user_id="1043">
        <div class="message_container">
            <div class="member_image" style="background-image:url({{ asset('img/' . Auth::user()->image) }});">
                <img src="{{ asset('img/' . Auth::user()->image) }}" alt="Member Image">
            </div>
            <div class="message_data">
                <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                
                 <p>{{$item->message}}<br>

                                            
            </div>
        </div>
        <div class="message_additional">
            
                {{ date('d F Y h:i:s A', strtotime($item->create_time))  }}
                                       

        </div>
    </div>

 </li>
 @endforeach
         
</ul>
</div>
        </div>
    
    <!--			
                    <div class="message_note">				
                        <p><strong ></strong><br />23 Nov, 2022 05:38 AM</p>
                        <p></p>			
                    </div>
    -->
        
        <p onclick="showMsg();" class="add_new_note" style="margin-top:10px;"><a href="#" onclick="showMsg();" class="btn mini_button"><span class="fa fa-plus"></span> Add New Note </a></p>
        <div class="">
            <form style="display:none;" id="theMessage" action="{{route('mybuilding.newnote',$repair_detail->id)}}" method="post">
            @csrf
                <h3>Add New Note</h3>
                <div class="row">
                    <div class="field">
                        <textarea cols="130" name="reply_text" id="reply_text" placeholder="Enter message"></textarea>
                    </div>					
                </div>
                
                <div class="row">
                    <div class="field button_group">
                        <input type="submit" id="submit_reply" class="btn" value="Save Note" />				
                    </div>					
                </div>
                
            </form>
        </div>
    
        <div id="page_selection_2" class="page_selection"></div>
    
        <form action="{{route('mybuilding.myrepairsUpdate',$repair_detail->id)}}" method="post" >
            @csrf
            <input type="hidden" name="event_id" id="event_id" value="{{$repair_detail->id}}" />
            <input type="hidden" name="end_date" id="event_id" value="{{date("Y-m-d h:i:s")}}" />
            <h3>Status Of Task:</h3>
            <div class="row">
                <div class="field">				
                    <select name="status_of_task" id="status_of_task">					
                        <option value="0" {{ $repair_detail->status == 0 ? 'selected' : '' }}>In Process</option>
                        <option value="1" {{ $repair_detail->status == 1 ? 'selected' : '' }}>Completed</option>					
                    </select>
                </div>
            </div>
            
            <h3>Assigned To: John Doe</h3>
            
                
            <h3>Start Date:</h3>
            <div class="row">
                {{ date('d F Y, h:i A')  }}
            </div>
                            
            
            <div class="errors"></div>
            
            <div class="row submit_buttons">
                <div class="field button_group" style="width:200px">
                    <input style="padding: 16px 75px;" type="submit" id="update_task" class="btn" value="submit" />				
                </div>					
            </div>
            
        </form>
        
    </div>
    
    <div class="confirmation">
        <div class="fullscreen_container">
        
            <div class="fullscreen_container_inner">
                
                <div class="fullscreen_with_image">		
                    <p>
                    Thank you
                    </p>				
                    <div class="fullscreen_image_container" style="background-image:url(/apt_apply_assets/images/avatars/sample2.jpg)">
                        <img src="/apt_apply_assets/images/avatars/sample2.jpg" alt="Confirmation Image" />
                    </div>
                    <p class="image_heading">Leon Wilson</p>
                    <p class="image_sub_heading">Repairs Manager</p>				
                </div>
                            
                <p class="fullscreen_message">				
                    Thank you , we have received the update.
                </p>			
                
                <p class="fullscreen_button">				
                    <a href="/" title="Go To Dashboard">Go To Dashboard</a>
                </p>
                
            </div>
            
        </div>
    </div>
    
        
        
                <br />


                
    
@endsection

@section('js')
<script>
    var element = document.getElementById("theMessage");

function showMsg(){
    element.style.display = "block";
}

function hideMsg() {
      element.style.visibility = "hidden";
}
</script>
@endsection

