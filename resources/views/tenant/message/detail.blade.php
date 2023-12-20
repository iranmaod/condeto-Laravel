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
	
	    

	<div class="container messages_container message_detail" data-type="notification" data-message_id="" data-page_count="" data-per_page="">
	
		<h2><img src="{{asset('img/message_blue.png')}}"> Your {{$message->title}} is confirmed</h2>

		<div class="outer_message_container has_read "  >
			<div class="message_container">
                <div class="member_image" style="background-image:url({{ asset('img/' . $message->image) }});">
                    <img src="{{ asset('img/' . $message->image) }}" alt="Member Image">
                </div>
				<div class="message_data">
					<p><p>Dear {{$message->first_name}},</p><br />
                <p>{{$message->message}} </p><br />
                <p>Sincerely, Building Management</p></p>

				</div>
			</div>
			<div class="message_additional">
				<date>
                    {{date('F d, Y h:i a',strtotime( $message->create_time))}}
									</date>

			</div>
		</div>
				
	</div>


@if(isset($all_message))
    <div class="container messages_container message_detail" data-type="notification" data-message_id="" data-page_count="" data-per_page="">
	<ul>
        @foreach($all_message as $item)

        <li>

            <div class="outer_message_container has_read "  >
                <div class="message_container">
                    <div class="member_image" style="background-image:url({{ asset('img/' . $item->image) }});">
                        <img src="{{ asset('img/' . $item->image) }}" alt="Member Image">
                    </div>
                    <div class="message_data">
                        <p><p>{{$item->first_name}} {{$item->last_name}},</p><br />
                    <p>{{$item->message}} </p><br />
                    </p>
    
                    </div>
                </div>
                <div class="message_additional">
                    <date>
                        {{date('F d, Y h:i a',strtotime( $item->create_time))}}
                                        </date>
    
                </div>
            </div>
            </li>


        @endforeach
        
        
    </ul>
		
				
	</div>




    <div style="margin-top: 10px" class="reply_container" id="reply_container">
        <div class="errors"></div>
        <form action="{{route('message.reply',$message->id)}}" method="post" >
            @csrf
            <div class="row">					
                <textarea rows="4" cols="120" name="reply_text" id="reply_text" placeholder="reply"></textarea>
                <button class="btn" id="submit_reply">Send</button>					
            </div>
            
            
        </form>
    </div>



@endif

	
	
			<br />
    
@endsection