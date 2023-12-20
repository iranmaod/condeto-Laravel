<?php
use App\Models\Property;
?>
@extends('front.index')
@section('title')
Rental Applications
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Rental Applications</h1>
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
@section('dashboard')

<div class="">
	
	    

    <div class="container task_listing repair_listing_page">
                    <h2 class="d-flex"><img src="{{asset('img/event.png')}}" />Pending  Pickups
                    </h2>
                

        <ul>
            @foreach ($pending_visitor as $item)
            
            <li>
                <div class="task_container">												
                    <div class="inline_content">
                        <p><span class="title"><strong>Date Submitted</strong>: {{date('F d, Y h:i a',strtotime( $item->create_time))}}</span></p>
                        <p><strong>Expected Pickup  Date:</strong> {{date('F d, Y h:i a',strtotime( $item->start_time))}}</p>
                    </div>														
                    <p><strong>Tenant: </strong>{{$item->first_name}} {{$item->last_name}}, Apartment 
                    <?php
                        
                        $apartment =  Property::where('parent_property_id',$item->object_id)->first();    
                    ?>
                    @if(isset($apartment))
                    #{{$apartment->name}}
                    @endif
                    
                    </p>

                        <div class="items_in_request">
                        
                            <p>Name of Pickup (s)</p>
                            <ul class="task_items">
                                
                                <li>{{$item->message}}</li>
                            </ul>
                            
                        </div>
                            <p><a href="/tasks_list_pickup/{{$item->id}}" class="btn mini_button">View Pickup  Request</a></p>
                </div>
            </li>	
                
            @endforeach
             
                                                                                                                                                                                                                                                                                                                                                                    
                                                                                                                
           	
                                                                                                                                                                                            
                </ul>

                        {{-- <p>There are no records to display</p> --}}
                    
                    <div class="filters" style="margin-top:30px;">	
                <div class="filter_group">
                    <div class="filter">
                        <label for="main_filter">Filter by time</label>
                        <select name="main_filter" id="main_filter">								
                            <option  value="last_week">Last Week</option>
                            <option  selected="selected"  value="">Last Month</option>
                            <option value="last_year">Last Year</option>
                            <option value="all_time">All Time</option>
                        </select>
                    </div>	
                </div>
            </div>
                    
            <div class="task_listing_details">
                    <h2 style="margin-top:30px;"><img src="{{asset('img/event.png')}}" />Incomplete  Pickups</h2>
                
            <ul class="tasks">
                                                    <li>
                            <h3><a href="#" class="toggle_block">Air Conditioning<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Apartment Door<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Appliances<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Building Doors and Locks<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Common Areas: Cleaning/Repair<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Electrical<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Elevators<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Heating<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Hot Water<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Leaks<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Other<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Painting<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Plumbing<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Smoke/Carbon Monoxide Detectors<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Vents<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                        <li>
                            <h3><a href="#" class="toggle_block">Windows<span class="fa fa-chevron-down"></span></a></h3>					
                            <ul>
                                                        </ul>
                        </li>
                                    
            </ul>
                        <p>There are no records to display</p>
                    
            <h2 style="margin-top:30px;"><img src="{{asset('img/calendar-tick.png')}}" />Completed  Pickups</h2>
            <ul>
                
                @foreach ($complete_visitor as $item)
                
                <li>
                    <div class="task_container">												
                        <div class="inline_content">
                            <p><span class="title"><strong>Date Submitted</strong>: {{date('F d, Y h:i a',strtotime( $item->create_time))}}</span></p>
                            <p><strong>Expected Pickup  Date:</strong> {{date('F d, Y h:i a',strtotime( $item->start_time))}}</p>
                        </div>														
                        <p><strong>Tenant: </strong>{{$item->first_name}} {{$item->last_name}}, Apartment 
                        <?php
                            
                            $apartment =  Property::where('parent_property_id',$item->object_id)->first();
                            //   print_r($apartment)
                        ?>
                        {{-- {{$apartment->name}} --}}
                        @if(isset($apartment))
                        #{{$apartment->name}}
                        @endif
                        {{-- {{$item->object_id}} --}}
                        </p>
    
                            <div class="items_in_request">
                            
                                <p>Name of Pickup (s)</p>
                                <ul class="task_items">
                                    
                                    <li>{{$item->message}}</li>
                                </ul>
                                
                            </div>
                                <p><a href="/tasks_list_pickup/{{$item->id}}" class="btn mini_button">View Pickup  Request</a></p>
                    </div>
                </li>	
                    
                @endforeach
                 
                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                    
                   
                                                                                                                                                                                                
                    </ul>
                </div>
    </div>
    
        
        
                <br />
    
@endsection