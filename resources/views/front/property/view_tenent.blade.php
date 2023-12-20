@extends('front.index')
@section('title')
Tenants
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
            <h1>Tenants</h1>
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
	
	    

	<div class="container tenants">	
		<div class="apartment_data" data-property_id="">
			<p><strong>Address</strong> : {{$building->name}}, , {{$address->name}}, NY, 11216
							<br /><br /><a class="btn mini_button" href="/properties_list/{{$building->id}}/{{$address->id}}/tenants/add_new">Add new tenant</a>
						</p>
			
		</div>
		
		<div class="errors">
		</div>
		
		<div class="layout_table keep_rwd">
			<div class="layout_table_row layout_table_row_header">
				<div class="layout_table_cell">
					<p>First Name</p>
				</div>
				<div class="layout_table_cell">
					<p>Last Name</p>
				</div>				
				<div class="layout_table_cell" style="text-align:right">
					<p></p>
				</div>				
			</div>
			@foreach($tenents as $item)
                
			<div class="layout_table_row  vacant">
								
				
				<div class="layout_table_cell">
					<label></label><p>{{$item->first_name}}</p>
				</div>
				<div class="layout_table_cell">
					<label></label><p>{{$item->last_name}}</p>
				</div>
				
			</div>
			@endforeach
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
@endsection
