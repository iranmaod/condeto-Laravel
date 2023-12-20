@extends('tenant.index')
@section('title')
Facility Bookings
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Facility Bookings</h1>
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
                    <label for="filters">Filter by status</label>
                    <select id="filters">
                        <option  selected="selected"  value="">No Filter</option>					
                        <option  value="paid">Paid/ No Charge</option>
                        <option  value="unpaid">UnPaid</option>
                        <option  value="past">Show Past Bookings</option>
                    </select>
                </div>
            </div>
            
            <div class="filter_group">
                <div class="filter">
                    <label for="filters">Filter by facility</label>
                    <select id="sub_filters" style="display:inline-block;">
                        <option value="">No Filter</option>
                                            <option  value="2">Main Meeting Room</option>
                                            <option  value="1">Purple Basketball Court</option>
                                            <option  value="3">Swimming Pool</option>
                                        </select>
                </div>
            </div>			
        </div>
        
        <div class="errors"></div>
        
        <h2><img src="{{asset('img/event.png')}}" />Facility Bookings</h2>
        
        <div class="data_block">
        
            
        <ul class="standard_listing" data-page_count="1">
            @foreach ($facility as $item)
            <?php 
            $start = explode(' ',$item->start_time);
            $end = explode(' ',$item->end_time);
          ?>
            <li>
                <div class="task_container" data-id="">					
                    <p><strong>{{$item->f_name}}</strong> - {{$building->name}}</p>
                    <p><strong>Date</strong> : {{date('d F, Y ',strtotime( $start[0]))}}</p>
                    <p><strong>Time</strong>: {{ date('h:i a ',strtotime($start[1])) }} - {{ date('h:i a ',strtotime($end[1])) }}</p>
                    <p><strong>Status</strong>: 
                                            N/C
                                        </p>
                </div>
            </li>
                
            @endforeach
               
                    
        </ul>
        
            
            </div>
        
    </div>
    
        
        
                <br />
    
@endsection


@section('js')







@endsection