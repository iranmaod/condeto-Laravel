@extends('front.index')
@section('title')
Reports
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Reports</h1>
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
	
	    
	
	<div class="container reports">
        
		<h2><img src="{{asset('img/reports_dark.png')}}" />Reports</h2>
		<ul class="subMenu">
			<li><a href="/reports/run_report/repairs"><img src="{{asset('img/repairs.png')}}" /> <span>Repair Requests &amp; Performance</span></a></li>
			<li><a href="/reports/run_report/facilities"><img src="{{asset('img/building_sub.png')}}" /> <span>Facilities Usage</span></a></li>
			<li><a href="/reports/run_report/payments"><img src="{{asset('img/bills.png')}}" /> <span>Payments</span></a></li>
			<!--<li><a href="#"><img src="/apt_apply_assets/images/icons/truck.png" /> <span>Move In/Out</span></a></li>
			<li><a href="#"><img src="/apt_apply_assets/images/icons/applications-blue.png" /> <span>Applications</span></a></li>-->
		</ul>
		
	</div>

	
	
			<br />
    
@endsection