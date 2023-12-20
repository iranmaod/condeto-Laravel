@extends('front.index')
@section('title')
Facility Bookings
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Facility Bookings</h1>
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
@section('dashboard')

<div class="main_content">
	
	    



	<div class="container task_listing">
		
		<div class="filters">		
			<div class="filter" style="display:none">
				<input type="text" name="layout_table_search" class="layout_table_search" placeholder="Type to search table" id="layout_table_search" data-table="property_table" />
			</div>
			
			<div class="filter">
				<div class="filter_group">
					<label>Filter by Paid/Unpaid</label>
					<select id="filters">
						<option  selected="selected"  value="">No Filter</option>					
						<option  value="paid">Paid/ No Charge</option>
						<option  value="unpaid">UnPaid</option>					
					</select>
				</div>
				
				<div class="filter_group">
					<label>Filter by Facility</label>
					<select id="sub_filters" style="display:inline-block;">
						<option value="">No Filter</option>
											</select>
				</div>
			</div>			
		</div>
		
		<div class="data_block">
		
				
		<div class="layout_table" id="property_table">
			<div class="layout_table_row layout_table_row_header">
				<div class="layout_table_cell">
					<p>Address</p>
				</div>
				<div class="layout_table_cell">
					<p>Facility</p>
				</div>
								<div class="layout_table_cell">
					<p>Tenant</p>
				</div>
								<div class="layout_table_cell">
					<p>Date</p>
				</div>
				<div class="layout_table_cell">
					<p>Start Time</p>
				</div>
				<div class="layout_table_cell">
					<p>End Time</p>
				</div>
				<div class="layout_table_cell">
					<p>Status</p>
				</div>
				<div class="layout_table_cell">
				</div>
			</div>
										<p style="margin-top:10px;">There are no records to display</p>
					</div>
		
			</div>
		
	</div>

	
	
			<br />
    
@endsection