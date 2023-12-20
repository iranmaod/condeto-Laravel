<?php
use App\Models\Property;
?>

@extends('front.index')
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Welcome Back {{Auth::user()->first_name}}</h1>
        <p class="sub_title"><a href="#" class="trigger_change_building">
            @if(app('request')->input('change_building'))
            <?php 
            
            $item = app('request')->input('change_building');
            echo $item;
            $pro = Property::where('id',$item)->first();
            ?>
            {{$pro->name}}
         @endif	   
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
            @foreach($user_building as $item)

            <?php
            
            $property = Property::where('id',$item->property_id)->first();
                // echo '<pre>';
            // print_r($item->id);exit;
            ?>


            <option selected="selected" value="{{$property->id}}">{{$property->name}}</option>
            @endforeach
                
        </select>
    </div>
</div>	
@endsection
<div class="row">
    <h2><img src="{{asset('img/building_sub.png')}}" alt="My Building">
        @if(app('request')->input('change_building'))
           <?php 
           
           $item = app('request')->input('change_building');
           echo $item;
           $pro = Property::where('id',$item)->first();
           ?>
           {{$pro->name}}
        @endif	
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
            <p><a class="" href="/messages"><span class="number_circle">{{count($message)}} </span><span class="title">You have {{count($message)}} unread messages.</span></a><a class="btn" href="/messages">Go</a></p>
        </div>
        
    </li>
    
                    <li>
        
        <div class="task_container" data-id="1">		
            <p><a class="" href="/tasks_list_repairs"><span class="number_circle">{{count($repairs)}} </span><span class="title">There are 
            
                {{count($repairs)}} pending/incomplete repair requests.
                                    </span></a><a class="btn" href="/tasks_list_repairs">Go</a></p>
        </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list_delivery"><span class="number_circle">{{count($delivery)}} </span><span class="title">There are 
                
                    {{count($delivery)}} incomplete deliveries.
                                            
                </span></a><a class="btn" href="/tasks_list_delivery">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list_pickup"><span class="number_circle">{{count($pickup)}} </span><span class="title">There are 
                
                    {{count($pickup)}} incomplete pickups.
                                            
                </span></a><a class="btn" href="/tasks_list_pickup">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/tasks_list"><span class="number_circle">{{count($visitor)}} </span><span class="title">
                There are 
                
                {{count($visitor)}} incomplete visitors requests.
                                            
                </span></a><a class="btn" href="/tasks_list">Go</a></p>
            </div>
        
    </li>
                    
                    <li>
        
            <div class="task_container" data-id="1">		
                <p><a class="" href="/facility_bookings"><span class="number_circle">{{count($facility)}} </span><span class="title">There are {{count($facility)}} upcoming facility bookings.</span></a><a class="btn" href="/facility_bookings">Go</a></p>
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