@extends('front.index')
@section('title')
Manage Buildings
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Welcome Back {{Auth::user()->first_name}}</h1>
        <p class="sub_title"><a href="#" class="trigger_change_building"> <span class="fa fa-caret-down"></span></a>
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
	
	    

	<div class="container profile">
		
		<h2><img src="{{asset('img/user-blue.png')}}" alt="Your Profile">Add New Staff</h2>
		<div class="errors"></div>			
		<form action="{{route('staff.add')}}" method="post">
            @csrf
			<h3>Staff Information:</h3>
			
			<div class="row">
				<div class="field forty">
					<label>Staff Role</label>
					<select name="staff_role" id="staff_role">
                            <option value="21">Building Manager</option>
                            <option value="22">Door Manager</option>
                            <option value="23">Facilities Manager</option>
                            <option value="2005">Repair Manager</option>
                    </select>
				</div>
			</div>
			
			<div class="row">					
				<div class="field forty">
					<label>First Name</label>
					<input class="required" required="required" type="text" name="first_name" id="first_name" placeholder="First Name" value="" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your first name"/>
				</div>
				<div class="field forty">
					<label>Last Name</label>
					<input class="required" required="required" type="text" name="last_name" id="last_name" placeholder="Last Name" value="" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your last name"/>
				</div>				
			</div>
			<div class="row">
				<div class="field forty">
					<label>Email Address</label>
					<input class="required" required="required" type="text" name="email_address" value="" id="email_address" placeholder="Email Address" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your email"/>
				</div>
				<div class="field forty">
					<label>Phone Number</label>
					<input class="required" required="required" type="text" name="phone_number" id="phone_number" placeholder="Phone Number" value="" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your phone number"/>
				</div>
			</div>
			
			<div class="row submit_buttons">
				<button type="submit" class="btn" id="submit_profile">Save</button>
			</div>
						
		</form>
		
	</div>

	
	
			<br />
    
@endsection