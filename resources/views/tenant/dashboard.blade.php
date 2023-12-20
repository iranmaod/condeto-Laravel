@extends('tenant.index')
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Welcome Back {{Auth::user()->first_name}}</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
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
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	
@endsection
<div class="row">
    <h2><img src="{{asset('img/building_sub.png')}}" alt="My Building">My Building</h2>
    <ul class="dashboard_notifications">
    
        <li>
            <div class="payment_container" data-id="1">
                @if($payment)
                <p><a class="" href="/makepayment/{{$payment->reference }}"><img src="{{asset('img/dollar.png')}}"><span class="title">There are rents due - ${{$payment->amount - $payment->amount_paid}}.</span></a><a class="btn" href="/makepayment/{{$payment->reference }}">Go</a></p>
                @endif
                </div>
            {{-- <div class="task_container" data-id="1">
                <p><a href="/makepayment/{{$payment->reference }}"><img src="{{asset('img/dollar.png')}}"><span class="title">There are rents due of {{$payment->amount - $payment->amount_paid}}.</span></a><a class="btn" href="/makepayment/{{$payment->reference }}">Go</a></p>
            </div> --}}
            
        </li>
        <li>
            <div class="task_container" data-id="1">		
                <p><a class="" href="/my_building/repairs/my_repairs"><span class="number_circle">{{count($repairs_request)}} </span><span class="title">You have {{count($repairs_request)}} repair requests.</span></a><a class="btn" href="/my_building/repairs/my_repairs">Go</a></p>
            </div>					
        </li>

        <li>					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/my_building/deliveries/my_deliveries"><span class="number_circle">{{count($delivery)}} </span><span class="title">You have {{count($delivery)}} deliveries scheduled.</span></a><a class="btn" href="/my_building/deliveries/my_deliveries">Go</a></p>
            </div>					
        </li>
        <li>					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/my_building/pickups/my_pickups"><span class="number_circle">{{count($pickup)}} </span><span class="title">You have {{count($pickup)}} pickups scheduled.</span></a><a class="btn" href="/my_building/pickups/my_pickups">Go</a></p>
            </div>					
        </li>
        <li>					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/my_building/visitors/my_visitors"><span class="number_circle">{{count($visitor)}} </span><span class="title">You have {{count($visitor)}} visitors scheduled.</span></a><a class="btn" href="/my_building/visitors/my_visitors">Go</a></p>
            </div>					
        </li>
        <li>					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/my_building/facilities/my_bookings"><span class="number_circle">{{count($facility)}} </span><span class="title">You have {{count($facility)}} facilities scheduled.</span></a><a class="btn" href="/my_building/facilities/my_bookings">Go</a></p>
            </div>					
        </li>
        <li>					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/apply"><span class="number_circle">{{count($all_apartments)}} </span><span class="title">There are {{count($all_apartments)}} available apartments.</span></a><a class="btn" href="/apply">Go</a></p>
            </div>					
        </li>
                        
                      

    </ul>
</div>

<div class="row">
    <h2><img src="{{asset('img/message_blue.png')}}" alt="Messages">Messages</h2>
    <ul class="dashboard_notifications dashboard_messages">				
  
   
 
    <li>
                    <p><a class=""  href="/messages/1066"><span class="title">			
            <date>						May 03, 2018 7:58 AM
            </date> 
            To: Lisa Smith, Have you received the rent payment this month?</span>
        </a>					
            <a class="btn"  href="/messages/1066">Go</a>
            
        </p>
            </li>
 
        
    </ul>
</div>	
    
@endsection