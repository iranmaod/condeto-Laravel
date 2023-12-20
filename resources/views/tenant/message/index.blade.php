<?php
use Carbon\Carbon;
?>

@extends('tenant.index')
@section('title')
Messages
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Messages</h1>
					<p class="sub_title"> {{$building->name}} 
                    </p>
           
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	
@endsection
@section('dashboard')



<div class="main_content">
	
	    

	<div class="container messages_inbox " data-type="user_topics" data-message_id="" data-page_count="12" data-per_page="20">
		
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

							<div class="outer_message_container notification ">
								<div class="message_container">
																	<div class="member_image">
											<span class="fa fa-bell"></span>
										</div>
																
									<div class="message_data">
										@if($item->type_id == 4 && $item->object_id == Auth::id())
										<h4>To: {{$item->first_name}} - <date>
											{{date('F d, Y h:i a',strtotime( $item->create_time))}}
											</date></h4>
										@elseif($item->type_id == 4 && $item->user_id == Auth::id())
										<h4>From: {{$item->first_name}} - <date>
											{{date('F d, Y h:i a',strtotime( $item->create_time))}}
											</date></h4>
										@else	
										<h4>Notification - <date>
										{{date('F d, Y h:i a',strtotime( $item->create_time))}}
										</date></h4>
										@endif
										
										@if($item->type_id == 3)
										<h5>Your Swimming Pool reservation is confirmed</h5>
										@elseif($item->type_id == 1)
										<h5>Your Purple Basketball reservation is confirmed</h5>
										@elseif($item->type_id == 2)
										<h5>Your Main Meeting Room reservation is confirmed</h5>
										@elseif($item->type_id == 38 || $item->type_id == 2007 || $item->type_id == 47 || $item->type_id == 2016 || $item->type_id == 48)
										<h5>New {{$item->description}} request received</h5>
										@elseif($item->type_id == 15)
										<h5>New {{$item->description}} request received</h5>
										@elseif($item->type_id == 14 || $item->type_id == 50)
										<h5>New {{$item->description}}  received</h5>
										@elseif($item->type_id == 2006)
										<h5>New {{$item->description}} request received</h5>
										@elseif($item->type_id == 16)
										<h5>New {{$item->description}} Announcement</h5>
										@elseif($item->type_id == 4 && $item->object_id == Auth::id())
										<h5>{{$item->title}}</h5>
										@elseif($item->type_id == 4 && $item->user_id == Auth::id())
										<h5>{{$item->title}}</h5>
										
										@endif
									</div>				
								</div>		
						
								</div>
			
							</li>

						</a>
			
					
				@endforeach
				
				</ul>
				

			</div>
			
		</div>
		
		<div id="page_selection2" class="page_selection">
			<ul class="pagination bootpag">
				<div class="d-flex justify-content-center">
					{{-- {!! $message->links() !!} --}}
				</div>
				
			</ul>
		</div>

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