@extends('front.index')
@section('title')
Payments Report
@endsection
@section('header')
<header class="main_header">
        <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                        <h1>Payments Report</h1>
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
		
		<div class="row_split" style="width:100%;text-align:center;">
						
					</div>
		<div style="clear:both"></div>
				
		<h2>Payment Amounts</h2>
		
						
			<p>There is no data for this range</p>
		
		<h2>Payments/Late Payments</h2>
		
						
			<p>There is no data for this range</p>
				
				
				
		
		<div class="data_table">
			<h2>Data</h2>
			
							
				<p>There is no data for this range</p>
					</div>
		
				
	</div>	

	
	
			<br />
			
    
@endsection

