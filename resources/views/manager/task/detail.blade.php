@extends('front.index')
@section('title')
{{$task->description}} Repair Requests
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>{{$task->description}} Repair Requests</h1>
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
                    <h2><img src="{{asset('img/event.png')}}" />Pending {{$task->description}}  Repairs
                    </h2>
                
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
                    
                    
            <div class="task_listing_details">
                    <h2 style="margin-top:30px;"><img src="{{asset('img/event.png')}}" />Incomplete {{$task->description}}  Repairs</h2>
                
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
                        
            <h2 style="margin-top:30px;"><img src="{{asset('img/calendar-tick.png')}}" />Completed {{$task->description}} Repairs</h2>
                
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
                </div>
    </div>
    
        
        
                <br />
	
    
@endsection