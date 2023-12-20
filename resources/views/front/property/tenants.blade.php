@extends('front.index')
@section('title')
Manage Tenants
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Manage Tenants</h1>
        <p class="sub_title"><a href="#" class="trigger_change_building">
			@foreach($property as $item)
			@if(app('request')->input('change_building') == $item->id)
				{{$item->name}}
			@endif	
			@endforeach	
		<span class="fa fa-caret-down"></span></a>
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
@section('dashboard')
<div class="main_content">
	
	    

	<div class="container properties">
				<div class="filters">
			<div class="filter_group" style="float:left;">
				<label for="main_filter">Search</label>
				<div class="filter">
					<input type="text" name="ajax_layout_table_search" class="layout_table_search" placeholder="Type to search" id="ajax_layout_table_search" data-table="property_table" />
				</div>
			</div>
				
			<div class="filter_group" style="float:right;">
				<label for="main_filter">Filter by status</label>
				<div class="filter">
					<select name="main_filter" class="selectpicker" id="main_filter" data-building_id="1488">
						<option  selected="selected" value="">No Filter</option>
						<option  value="vacant" data-content="Vacant Properties <span class='indicator transparent'></span>">Vacant Properties</option>
						<option value="rent_overdue" data-content="Rent Overdue <span class='indicator red'></span>">Rent Overdue</option>
						<option value="rent_current" data-content="Rent Current <span class='indicator green'></span>">Rent Current</option>
					</select>
				</div>
						</div>
		</div>
				
		<div class="layout_table" id="property_table">
			<div class="layout_table_row layout_table_row_header">
				
				<div class="layout_table_cell">
					<p>Address</p>
				</div>
				<div class="layout_table_cell">
					<p>Primary Tenant</p>
				</div>
				<div class="layout_table_cell">
					<p>Apartment</p>
				</div>
								<div class="layout_table_cell">
					<p>Monthly Rent</p>
				</div>
				<div class="layout_table_cell">
					<p>Due Date</p>
				</div>	
				<div class="layout_table_cell">					
				</div>
				<div class="layout_table_cell">					
					<p>Status</p>
				</div>
				</div>
                @foreach($building as $item)
                
					<div class="layout_table_row  vacant">
										
						<div class="layout_table_cell">							
							<label>Address</label><p>{{$address->name}}<br />NY, 11205</p>
						</div>
						<div class="layout_table_cell">
							<label>Primary Tenant</label><p>
															Vacant
														
							<br />
								<a class="btn mini_button" style="padding:2px 8px !important;font-size:9px !important;" href="/properties_list/{{$item->id}}/{{$address->id}}/tenants/add_new">+ Tenant</a>
							</p>
						</div>
						<div class="layout_table_cell">
							<label>Apartment</label><p>{{$item->name}}</p>
						</div>
												<div class="layout_table_cell">
							<label>Monthly Rent</label><p></p>
						</div>
						<div class="layout_table_cell">
							<label>Due Date</label><p></p>
						</div>
						<div class="layout_table_cell">
							<p><a class="btn mini_button" href="/properties_list/{{$item->id}}/{{$address->id}}/tenants">View</a></p>
						</div>
						<div class="layout_table_cell">
							<div class="indicator transparent"></div>
						</div>
					</div>
                    @endforeach
					</div>
		
	</div>

	
	
			<br />
    
@endsection