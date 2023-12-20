@extends('tenant.index')
@section('title')
My Buildings
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>My Buildings</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	    

    <div class="my_building_container">
    <ul class="icon_options">
        @if($payment)
                <li><a href="/makepayment/{{$payment->reference }}" title="Pay Rent"><div class="icon_block"><img alt="Pay Rent Icon" src="{{asset('img/rent_payments.png')}}" /></div><span>Pay Rent</span></a></li>
        @endif        
            <li><a href="/my_building/repairs" title="Repairs"><div class="icon_block"><img alt="Repairs Icon" src="{{asset('img/repairs.png')}}" /></div><span>Repair Request</span></a></li>
        <li><a href="/my_building/concierge" title="Concierge"><div class="icon_block"><img alt="Concierge Icon" src="{{asset('img/users-blue.png')}}" /></div><span>Concierge Services</span></a></li>	
        <!--<li><a href="/my_building/deliveries" title="Schedule Delivery"><div class="icon_block"><img alt="Delivery Icon" src="/apt_apply_assets/images/icons/delivery.png" /></div><span>Schedule Delivery</span></a></li>
        <li><a href="/my_building/pickups" title="Schedule Pickup"><div class="icon_block"><img alt="Delivery Icon" src="/apt_apply_assets/images/icons/delivery.png" /></div><span>Schedule Pickup</span></a></li>	
        <li><a href="/my_building/visitors" title="Schedule Visitor"><div class="icon_block"><img alt="Visitors Icon" src="/apt_apply_assets/images/icons/users-blue.png" /></div><span>Schedule  Visitors</span></a></li>	-->
        <li><a href="/my_building/facilities/book" title="Reserve Facility"><div class="icon_block"><img alt="Reserve Facility Icon" src="{{asset('img/calendar_question.png')}}" /></div><span>Reserve Facility</span></a></li>	
        <li><a href="/apply" title="Available Apartments"><div class="icon_block"><img alt="Available Apartments Icon" src="{{asset('img/cube.png')}}" /></div><span>Available Apartments</span></a></li>
        <li><a href="/my_building/resources" title="Building Resources"><div class="icon_block"><img alt="Resources Icon" src="{{asset('img/resources.png')}}" /></div><span>Building Resources</span></a></li>	
    </ul>
    
    <div class="container building_management">
        <h2><img src="{{asset('img/users-blue.png')}}">Building Management</h2>
        <div class="user_list_container">
        <ul>
                            <li>
                    
        <div class="member_container">
            <div class="member_image" style="background-image:url({{asset('img/thumb_1053.jpg')}});">
                <img src="{{asset('img/thumb_1053.jpg')}}" alt="Member Image" />
            </div>
            <div class="member_data">
                <h4>Andrew Brown</h4>, 
                <h5>Door Manager</h5>
            </div>
        </div>
        
                </li>
                        <li>
                    
        <div class="member_container">
            <div class="member_image" style="background-image:url({{asset('img/1054.jpg')}});">
                <img src="{{asset('img/1054.jpg')}}" alt="Member Image" />
            </div>
            <div class="member_data">
                <h4>John Doe</h4>, 
                <h5>Repair Manager</h5>
            </div>
        </div>
        
                </li>
                        <li>
                    
        <div class="member_container">
            <div class="member_image" style="background-image:url({{asset('img/default_image.png')}});">
                <img src="{{asset('img/default_image.png')}}" alt="Member Image" />
            </div>
            <div class="member_data">
                <h4>Bil Ding</h4>, 
                <h5>Building Manager</h5>
            </div>
        </div>
        
                </li>
                        <li>
                    
        <div class="member_container">
            <div class="member_image" style="background-image:url({{asset('img/default_image.png')}});">
                <img src="{{asset('img/default_image.png')}}" alt="Member Image" />
            </div>
            <div class="member_data">
                <h4>John Plumber</h4>, 
                <h5>Repair Manager</h5>
            </div>
        </div>
        
                </li>
                    
        </ul>
        </div>
        
    </div>
    </div>
    
    
        
        
                <br />
    
@endsection