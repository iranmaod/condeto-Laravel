@extends('front.index')
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Welcome Back {{Auth::user()->first_name}}</h1>
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
@endsection
<div class="row">
    <h2><img src="{{asset('img/building_sub.png')}}" alt="My Building">
        @foreach($property as $item)
        @if(app('request')->input('change_building') == $item->id)
            {{$item->name}}
        @endif	
        @endforeach
    </h2>
    <ul class="dashboard_notifications">
    
        <li>
            <div class="task_container" data-id="1">
                <p><a href="/properties_list/{{app('request')->input('change_building') ? app('request')->input('change_building') : 1248}}"><span class="number_circle">0 </span><span class="title">There are 0 rents due.</span></a><a class="btn" href="/properties_list/{{app('request')->input('change_building') ? app('request')->input('change_building') : 1248}}">Go</a></p>
            </div>
            
        </li>

        <li>
					
            <div class="task_container" data-id="1">		
                <p><a class="" href="/applications"><span class="number_circle">0 </span><span class="title">There are 0 applications.</span></a><a class="btn" href="/applications">Go</a></p>
            </div>
        
    </li>					
                    
    <li>
        
        <div class="task_container" data-id="1">		
            <p><a class="" href="/messages"><span class="number_circle">0 </span><span class="title">You have 0 unread messages.</span></a><a class="btn" href="/messages">Go</a></p>
        </div>
        
    </li>
    
                    <li>
        
        <div class="task_container" data-id="1">		
            <p><a class="" href="/tasks_list"><span class="number_circle">0 </span><span class="title">There are 
            
                                        0 pending/incomplete repair requests.
                                    </span></a><a class="btn" href="/tasks_list">Go</a></p>
        </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list"><span class="number_circle">0 </span><span class="title">There are 
                
                                                0 incomplete deliveries.
                                            
                </span></a><a class="btn" href="/tasks_list">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list"><span class="number_circle">0 </span><span class="title">There are 
                
                                                0 incomplete pickups.
                                            
                </span></a><a class="btn" href="/tasks_list">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list"><span class="number_circle">0 </span><span class="title">
                There are 
                
                                                0 incomplete visitors requests.
                                            
                </span></a><a class="btn" href="/tasks_list">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/facility_bookings"><span class="number_circle">0 </span><span class="title">There are 0 upcoming facility bookings.</span></a><a class="btn" href="/facility_bookings">Go</a></p>
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