@extends('front.index')
@section('title')
Run Report
@endsection
@section('header')
<header class="main_header">
        <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                        <h1>Run Report</h1>
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
	
	    
	
	<div class="container run_report_output">
		
				<div class="knob_container">
			<div class="inner_text">
				<p class="number">
					0.00<span>Days</span>
				</p>
				<p class="sub_text">Average Days to completion</p>
			</div>
			<input type="text" data-fgColor="#2294dd" data-bgColor="#deeff9" data-thickness=".15" data-width="150" value="0.00" data-max="0.00" data-min="0"  class="dial">
		</div>
				
				<h2>Number of Requests Submitted<br /><small>The number of actual requests that have been submitted by users.</small></h2>
		
							<p>There is no data for this range</p>
							
				<h2>Assignments by staff members<br /><small>This is a count of how many tasks have been assigned per staff member and has a start date within the date range supplied.</small></h2>		
							<p>There is no data for this range</p>
							
				
		<div class="data_table">
			<h2>Data<br /><small>A listing of the records with a start date between the dates supplied.</small></h2>
			
						
			<p>There is no data for this range</p>
					</div>
		
				
	</div>	

	
	
			<br />
		
		
	</div>
	
	</div>	
    
@endsection

