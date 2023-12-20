<?php
use Carbon\Carbon;
?>

@extends('front.index')
@section('title')
Messages
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Messages</h1>
        <p class="sub_title"><a href="#" class="trigger_change_building">
            @foreach($property as $item)
			@if(app('request')->input('change_building') == $item->id)
				{{$item->name}}
			@endif	
			@endforeach    
        <span class="fa fa-caret-down"></span></a>
            </p>
            
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	
@endsection
<div class="swap_property_container">
	<div class="swap_property_inner_container">
		<p>Please select the property you would like to manage</p>
		<select name="select_property" id="select_property">
			@foreach($property as $item)
			<option selected="selected" value="{{$item->id}}">{{$item->name}}</option>
			@endforeach
				
		</select>
	</div>
</div>
@section('dashboard')



<div class="main_content">
	
	    

	<div class="container messages_inbox " data-type="user_topics" data-message_id="" data-page_count="1" data-per_page="20">
		
		<h2>
			<img src="{{asset('img/message_blue.png')}}"> Messages 
			<ul class="title_right_options">								
				<!--<li><a class="load_notifications" title="Show Notifications" href="#"><span class="fa fa-bell"></span></a></li>
				<li><a class="load_direct_messages active" title="Show Direct Messages" href="#"><span class="fa fa-envelope"></span></a></li>-->
				<li><a class="reload" title="Reload Messages" href="#"><img src="{{asset('img/reload.png')}}" ></a></li>
			</ul>
		</h2>

		<div id="page_selection" class="page_selection"></div>
	
		<div class="messages_container">
			<div id="messages_list" class="messages_list">
			<ul>
				@foreach($message as $item)		
			<li>
			<a style="text-decoration: none" href="{{route('messages.detail',$item->id)}}">
				<div class="outer_message_container" data-message_id="1301" data-user_id="1026">
					<div class="message_container">
														<div class="member_image" style="background-image:url({{ asset('img/' . $item->image) }});">
								<img src="{{ asset('img/' . $item->image) }}" alt="Member Image">
							</div>
													
						<div class="message_data">
							@if($item->object_id == Auth::id())
							<h4>To: {{$item->first_name}} {{$item->last_name}} - 
							@else
							<h4> {{$item->first_name}} {{$item->last_name}} - 
							@endif	
							<date>
												
													
								{{date('F d, Y h:i a',strtotime( $item->create_time))}}
																								</date></h4>				
							<h5>{{$item->title}}</h5>

						</div>				
					</div>		
			
				</div>
			</a>
			</li>
			@endforeach
			
				</ul>
			</div>
		</div>
		
		<div id="page_selection2" class="page_selection"></div>

		<div class="new_message_container" id="new_message_container">
			<p>Some information about this screen can go in here.</p>
			<div class="errors"></div>
			<form action="" method="post" onsubmit="return false">
		
				<h3>New Message</h3>
				
				<div class="row" style="display:none;">
					<div class="field">
						<input type="text" name="to" id="to" placeholder="Recipient email address" value="" />
					</div>					
				</div>
				
				<div class="row">					
					<div class="field">
						<input type="text" name="subject" id="subject" placeholder="Subject" />
					</div>					
				</div>
				
				<div class="row">					
					<div class="field">
						<textarea name="message_text" id="message_text" placeholder="Enter your message here"></textarea>
					</div>					
				</div>
				
				<div class="row">
					<button class="btn" id="submit_new_message">Start Conversation</button>
					<button class="btn" id="cancel_new_message">Cancel</button>
				</div>
				
			</form>
		</div>
	</div>

	
	
			<br />
    
@endsection