@extends('front.index')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
@endsection
@section('title')
Apartments
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Apartments</h1>
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
					<p>Apartment</p>
				</div>
				
				<div class="layout_table_cell">					
					<p>Status</p>
				</div>
				<div class="layout_table_cell">					
					<p>Application Link</p>
				</div>
				</div>
                @foreach($building as $item)
                
					<div class="layout_table_row  vacant">
										
						<div class="layout_table_cell">							
							<label>Address</label><p>{{$address->name}}</p>
						</div>
						
						<div class="layout_table_cell">
							<label>Apartment</label><p>{{$item->name}}</p>
						</div>
												
						<div class="layout_table_cell">
							<label>Apartment</label><p>vacant</p>
						</div>
                        <div class="layout_table_cell">
							{{-- <a class="email_application_link btn mini_button"  href="/apply/3359" data-apartment_id="3359"><span class="fa fa-envelope"></span> Email</a> --}}
							<a  href="/apply/{{$item->id}}" type="button" class="btn mini_button" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><span class="fa fa-envelope"></span>
								Email
							</a>


							<input type="text" class="copy_link" value="https://manage.condeto.com/apply/{{$item->id}}" id="myInput">
							<button data-toggle="modal" data-target="#copyModal{{$item->id}}" class="btn mini_button" onclick="myFunction()"><span class="fa fa-copy"></span>Copy</button>

							 <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
		  <form action="{{route('apartment.email')}}" method="POST">
			@csrf
			<label for="">Please enter the email address to send the application link to</label>
			<input class="form-control" name="email" type="email">
			{{-- <h1>{{$item->id}}</h1> --}}
			<input class="form-control" name="apartment_id" value="{{$item->id}}" type="hidden">
			<input class="form-control" name="building_id" value="{{$address->id}}" type="hidden">
		 
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn mini_button" >Confirm</button>
		</form>  
		  <button type="button" class="btn mini_button" data-dismiss="modal">Cancel</button>
		</div>
	  </div>
	</div>
  </div>



							{{-- <p data-clipboard-target="#property_copy_3359" class="copy_application_link btn mini_button"><span class="fa fa-copy"></span> Copy</p>
							<input type="text" id="property_copy_3359" class="copy_link" value="https://manage.condeto.com/apply/3359"> --}}

							
						</div>
					</div>
					
					 <!-- Modal -->
  <div class="modal fade" id="copyModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
			<h6 class="modal-title" id="copyModalLabel">Clipboard Success</h6>
			<p>https://manage.condeto.com/apply/{{$item->id}} copied to clipboard</p>
		</div>
		<div class="modal-footer">
		
		  <button type="button" class="btn mini_button" data-dismiss="modal">Cancel</button>
		</div>
	  </div>
	</div>
  </div>
                    @endforeach
					</div>

					
  
 
		
	</div>

	<br />
    
@endsection
@section('js')

<script>
	function myFunction() {
	  // Get the text field
	  var copyText = document.getElementById("myInput");
	
	  // Select the text field
	  copyText.select();
	  copyText.setSelectionRange(0, 99999); // For mobile devices
	
	  // Copy the text inside the text field
	  navigator.clipboard.writeText(copyText.value);
	  
	  // Alert the copied text
	//   alert("Copied the text: " + copyText.value);
	}
	</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
@endsection