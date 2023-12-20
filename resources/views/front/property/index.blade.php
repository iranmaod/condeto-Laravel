@extends('front.index')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
@endsection
@section('title')
Manage Buildings
@endsection

@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
            <h1>Manage Buildings</h1>
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
	
	    

	<div class="container staff">			
		
		<div class="errors">
		</div>
		
		<h2><img src="{{asset('img/building_sub.png')}}">Manage</h2>
		<p>
			<a class="btn mini_button" href="/properties_list/{{ app('request')->input('change_building') ? app('request')->input('change_building') : '1248'}}/apartments">Apartments</a> 
			<a class="btn mini_button" href="/properties_list/{{ app('request')->input('change_building') ? app('request')->input('change_building') : '1248'}}">Tenants</a>
			<a data-toggle="modal" data-target="#exampleModal" class="btn mini_button message_all" href="#">Message All Users</a>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
		  <p>Send message to All users in the building</p>
		  <form action="{{route('message.post')}}" method="POST">
			@csrf
			<input type="text" class="form-control my-3" name="subject" id="" placeholder="Subject" size="50">
			<input type="hidden" class="form-control my-3" name="building_id" id=""  value="{{app('request')->input('change_building') ? app('request')->input('change_building') : '1248'}}">
			<textarea class="form-control" name="message" id="" cols="15" rows="5" placeholder="Enter your message here" size="50"></textarea>
			<select class="form-control my-3" name="toUsers" id="" >
				<option value="both">All users</option>
				<option value="tenants">Tenants</option>
				<option value="staff">Staff</option>
			</select>
		  
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn mini_button" >Send</button>
		</form>
		  <button type="button" class="btn mini_button" data-dismiss="modal">Cancel</button>
		</div>
	  </div>
	</div>
  </div>




		</p>
		
		<div class="notification_block">			
			<div class="field_checkbox_toggle mini_toggle">								
				<input type="checkbox"  data-key="community_active" name="community_active" id="community_active" class="chk_toggle" value="1" />
			</div>
			<p>Community Section Access</p>
		</div>
		
		<h2><img src="{{asset('img/message_blue.png')}}">Building Notifications:</h2>
		<p>Select the type of notifications that will get sent out to users.</p>
		<div class="notification_block">
			<div class="field_checkbox_toggle mini_toggle">
				<input type="checkbox" checked="checked" data-key="push_notifications" name="push_notifications" id="push_notifications" class="chk_toggle" value="1" />
			</div>
			<p>Push Notifications</p>
		</div>
		
		<div class="notification_block">			
			<div class="field_checkbox_toggle mini_toggle">								
				<input type="checkbox" checked="checked" data-key="email_notifications" name="email_notifications" id="email_notifications" class="chk_toggle" value="1" />
			</div>
			<p>Email Notifications</p>
		</div>
		
		<h2 style="margin-top:20px;"><img src="{{asset('img/building_sub.png')}}">Logo</h2>
		<p>
			{{-- @foreach($property as $item)
			@if(app('request')->input('change_building') == $item->id)
			<img src="{{ asset('user/profile/' . $buildinglogo->logo) }}" class="building_logo" />
			
			@endif	
			@endforeach --}}
			
			<label class="btn mini_button update_logo" for="logo">Upload Building Logo</label>
			@if(app('request')->input('change_building'))
			<form id="form" action="{{route('building.logo',app('request')->input('change_building'))}}" method="post" enctype="multipart/form-data">
				@csrf
				<input onchange="submit()" style="display:none" type="file" name="logo" id="logo" />
			</form>
			@endif
		</p>
		
		
		<h2 style="margin-top:20px;"><img src="{{asset('img/users-blue.png')}}">Staff</h2>
		<p><a class="btn mini_button" href="/building/staff/add_new">Add new staff</a></p>
		
		<div class="layout_table keep_rwd">
			<div class="layout_table_row layout_table_row_header">
				<div class="layout_table_cell">
					<p>First Name</p>
				</div>
				<div class="layout_table_cell">
					<p>Last Name</p>
				</div>
				<div class="layout_table_cell">
					<p>Role</p>
				</div>
				<div class="layout_table_cell" style="text-align:right">
					<p></p>
				</div>				
			</div>
					</div>
		
	</div>

	
	
			<br />
    
@endsection
@section('js')
<script>
	function submit() {
		let form = document.getElementById("form");
		form.submit();
		alert("Data stored in database!");
	}
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
@endsection
