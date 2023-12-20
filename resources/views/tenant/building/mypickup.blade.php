
@extends('tenant.index')
@section('title')
Pickups
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1> Pickups</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	    

    <div class="container tenant_repairs">
            
        <div class="filters">
            <div class="filter_group">
                <div class="filter">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        <option value="">All Categories</option>
                                            <option  value="2011">Air Conditioning</option>
                                            <option  value="2012">Apartment Door</option>
                                            <option  value="2013">Appliances</option>
                                            <option  value="2014">Building Doors and Locks</option>
                                            <option  value="2015">Common Areas: Cleaning/Repair</option>
                                            <option  value="47">Electrical</option>
                                            <option  value="2016">Elevators</option>
                                            <option  value="2017">Heating</option>
                                            <option  value="2018">Hot Water</option>
                                            <option  value="2019">Leaks</option>
                                            <option  value="2010">Other</option>
                                            <option  value="2020">Painting</option>
                                            <option  value="48">Plumbing</option>
                                            <option  value="2021">Smoke/Carbon Monoxide Detectors</option>
                                            <option  value="2022">Vents</option>
                                            <option  value="2023">Windows</option>
                                        </select>
                </div>		
            </div>
        </div>
        
        <div class="main_block">
            <h2><img src="{{asset('img/event.png')}}" />Pending Pickups</h2>	
                    <p>There are no records to display</p>
                    <ul class="standard_listing">
                
                            
            </ul>
            
            <div class="filters">		
                <div class="filter_group">
                    <div class="filter">
                        <label for="filters">Filter by time</label>
                        <select name="filters" id="filters">								
                            <option  selected="selected"  value="last_week">Last Week</option>
                            <option  value="last_month">Last Month</option>
                            <option value="last_year">Last Year</option>
                            <option value="all_time">All Time</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <h2 style="margin-top:30px;"><img src="{{asset('img/event.png')}}" />Overdue/Un-Scheduled Pickups</h2>	
            <ul class="tasks">
                <li>				
        <ul style="display:block;">
            @foreach ($pickup as $item)

            <li class="complete">
                        
                <div class="task_container" data-id="369">										
                    <div class="inline_content">
                        <p><span class="title"><strong>Date Requested</strong>: {{ date('d F Y h:i:s A', strtotime($item->create_time))  }}</span></p>
                        <p><strong>Date Scheduled:</strong> {{ date('d F Y h:i:s A', strtotime($item->start_time))  }}</p>
                    </div>
                    
                                                            <div class="items_in_request">
                        
                            <p>Items included in the pickup</p>
                            <ul class="task_items">
                                
                                <li>{{$item->message}}</li>
                                                                        </ul>
                            
                        </div>
                                                        
                    <p><a href="my_pickups/{{$item->id}}" class="btn mini_button">View Pickup Request</a></p>
                </div>								
            </li>
                
            @endforeach					
            
            </ul>
    </li>
        </ul>
            
            <h2 style="margin-top:30px;"><img src="{{asset('img/calendar-tick.png')}}" />Completed Pickups</h2>	
            <ul class="tasks">
                <li>				
        <ul style="display:block;">					
            @foreach ($comp_pickup as $item)

            <li class="complete">
                        
                <div class="task_container" data-id="369">										
                    <div class="inline_content">
                        <p><span class="title"><strong>Date Requested</strong>: {{ date('d F Y h:i:s A', strtotime($item->create_time))  }}</span></p>
                        <p><strong>Date Scheduled:</strong> {{ date('d F Y h:i:s A', strtotime($item->start_time))  }}</p>
                    </div>
                    
                                                            <div class="items_in_request">
                        
                            <p>Items included in the pickup</p>
                            <ul class="task_items">
                                
                                <li>{{$item->message}}</li>
                                                                        </ul>
                            
                        </div>
                                                        
                    <p><a href="my_pickups/{{$item->id}}" class="btn mini_button">View Pickups Request</a></p>
                </div>								
            </li>
                
            @endforeach	
         </ul>
    </li>
        </ul>
                </div>
        
    </div>
    
        
        
                <br />


                
    
@endsection

