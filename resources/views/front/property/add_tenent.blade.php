@extends('front.index')
@section('title')
Tenant Profile
@endsection
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Tenant Profile</h1>
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
			<option selected="selected" value="{{$item->id}}">{{$item->name}} </option>
			
			@endforeach
				
		</select>
	</div>
</div>	
@endsection
@section('dashboard')

<div class="main_content">
<div class="container profile">
	
		<h2><img src="{{asset('img/user-blue.png')}}" alt="Your Profile">Add New Tenant</h2>
		<div class="errors"></div>			
		<form action="{{route('addnewtenant',$apartment->id)}}" method="post" >
            @csrf
	
			<h3>Property Information:</h3>
			<div class="apartment_data" data-property_id="">
				<p><strong>Address</strong> : {{$building->name}}, BROOKLYN, NY, 11221</p>				
			</div>
	
			<h3>Tenant Information:</h3>
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
					<label>Apartment Number</label>
					<input type="text" name="apartment_number" id="apartment_number" placeholder="Apartment Number" value="{{$apartment->name}}" readonly="readonly" />
				</div>
				<div class="field forty">
					<label>Rent</label>
					<input type="text" name="rent" id="rent" placeholder="Rent" value="" placeholder="$" />
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
						
			<div class="row dob_row">					
				<div class="field">
					<label for="move_in_date">Move-In-Date</label>
					<select class="required" required="required" name="move_in_date_month" id="move_in_date_month" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the move in date.">
						<option value="">Month</option>
													<option value="1">January</option>							
													<option value="2">February</option>							
													<option value="3">March</option>							
													<option value="4">April</option>							
													<option value="5">May</option>							
													<option value="6">June</option>							
													<option value="7">July</option>							
													<option value="8">August</option>							
													<option value="9">September</option>							
													<option value="10">October</option>							
													<option value="11">November</option>							
													<option value="12">December</option>							
											</select>
				</div>
				<div class="field">
					<label for="move_in_date_day">&nbsp;</label>
					<select class="required" required="required" name="move_in_date_day" id="move_in_date_day" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the move in date.">
						<option value="">Day</option>
													<option value="1">1</option>							
													<option value="2">2</option>							
													<option value="3">3</option>							
													<option value="4">4</option>							
													<option value="5">5</option>							
													<option value="6">6</option>							
													<option value="7">7</option>							
													<option value="8">8</option>							
													<option value="9">9</option>							
													<option value="10">10</option>							
													<option value="11">11</option>							
													<option value="12">12</option>							
													<option value="13">13</option>							
													<option value="14">14</option>							
													<option value="15">15</option>							
													<option value="16">16</option>							
													<option value="17">17</option>							
													<option value="18">18</option>							
													<option value="19">19</option>							
													<option value="20">20</option>							
													<option value="21">21</option>							
													<option value="22">22</option>							
													<option value="23">23</option>							
													<option value="24">24</option>							
													<option value="25">25</option>							
													<option value="26">26</option>							
													<option value="27">27</option>							
													<option value="28">28</option>							
													<option value="29">29</option>							
													<option value="30">30</option>							
													<option value="31">31</option>							
											</select>
				</div>
				<div class="field">
					<label for="move_in_date_year">&nbsp;</label>
					<select class="required" required="required" id="move_in_date_year" name="move_in_date_year" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your date of birth year" >
						<option value="">Year</option>
																			<option value="2022">2022</option>							
													<option value="2021">2021</option>							
													<option value="2020">2020</option>							
													<option value="2019">2019</option>							
													<option value="2018">2018</option>							
													<option value="2017">2017</option>							
													<option value="2016">2016</option>							
													<option value="2015">2015</option>							
													<option value="2014">2014</option>							
													<option value="2013">2013</option>							
													<option value="2012">2012</option>							
													<option value="2011">2011</option>							
													<option value="2010">2010</option>							
													<option value="2009">2009</option>							
													<option value="2008">2008</option>							
													<option value="2007">2007</option>							
													<option value="2006">2006</option>							
													<option value="2005">2005</option>							
													<option value="2004">2004</option>							
													<option value="2003">2003</option>							
													<option value="2002">2002</option>							
													<option value="2001">2001</option>							
													<option value="2000">2000</option>							
													<option value="1999">1999</option>							
													<option value="1998">1998</option>							
													<option value="1997">1997</option>							
													<option value="1996">1996</option>							
													<option value="1995">1995</option>							
													<option value="1994">1994</option>							
													<option value="1993">1993</option>							
													<option value="1992">1992</option>							
													<option value="1991">1991</option>							
													<option value="1990">1990</option>							
													<option value="1989">1989</option>							
													<option value="1988">1988</option>							
													<option value="1987">1987</option>							
													<option value="1986">1986</option>							
													<option value="1985">1985</option>							
													<option value="1984">1984</option>							
													<option value="1983">1983</option>							
													<option value="1982">1982</option>							
													<option value="1981">1981</option>							
													<option value="1980">1980</option>							
													<option value="1979">1979</option>							
													<option value="1978">1978</option>							
													<option value="1977">1977</option>							
													<option value="1976">1976</option>							
													<option value="1975">1975</option>							
													<option value="1974">1974</option>							
													<option value="1973">1973</option>							
													<option value="1972">1972</option>							
													<option value="1971">1971</option>							
													<option value="1970">1970</option>							
													<option value="1969">1969</option>							
													<option value="1968">1968</option>							
													<option value="1967">1967</option>							
													<option value="1966">1966</option>							
													<option value="1965">1965</option>							
													<option value="1964">1964</option>							
													<option value="1963">1963</option>							
													<option value="1962">1962</option>							
													<option value="1961">1961</option>							
													<option value="1960">1960</option>							
													<option value="1959">1959</option>							
													<option value="1958">1958</option>							
													<option value="1957">1957</option>							
													<option value="1956">1956</option>							
													<option value="1955">1955</option>							
													<option value="1954">1954</option>							
													<option value="1953">1953</option>							
													<option value="1952">1952</option>							
													<option value="1951">1951</option>							
													<option value="1950">1950</option>							
													<option value="1949">1949</option>							
													<option value="1948">1948</option>							
													<option value="1947">1947</option>							
													<option value="1946">1946</option>							
													<option value="1945">1945</option>							
													<option value="1944">1944</option>							
													<option value="1943">1943</option>							
													<option value="1942">1942</option>							
													<option value="1941">1941</option>							
													<option value="1940">1940</option>							
													<option value="1939">1939</option>							
													<option value="1938">1938</option>							
													<option value="1937">1937</option>							
													<option value="1936">1936</option>							
													<option value="1935">1935</option>							
													<option value="1934">1934</option>							
													<option value="1933">1933</option>							
													<option value="1932">1932</option>							
													<option value="1931">1931</option>							
													<option value="1930">1930</option>							
													<option value="1929">1929</option>							
													<option value="1928">1928</option>							
													<option value="1927">1927</option>							
													<option value="1926">1926</option>							
													<option value="1925">1925</option>							
													<option value="1924">1924</option>							
													<option value="1923">1923</option>							
													<option value="1922">1922</option>							
											</select>					
				</div>
				<div class="field">
					<input type="text" style="padding:0 !important;width:0 !important;border:0 !important;" name="picker" value="" id="picker" />
					<img class="calendar_picker" src="{{asset('img/calendar-pick.png')}}" /> 
				</div>				
			</div>
			
			<div class="row">
				<div class="field">
					<label>Length of lease</label>
					<select class="required" required="required" id="lease_length" name="lease_length" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the lease length" >
						<option value="1">1 Year</option>
						<option value="2">2 Years</option>
						<option value="3">3 Years</option>						
					</select>	
				</div>				
			</div>
			
			<div class="row">
				<div class="field">
					<label>Children</label>
					<select class="required" required="required" id="children" name="children" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the lease length">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4+</option>
					</select>
				</div>				
			</div>
			
			<div class="row child_row">
				<div class="field forty child_field">
					<label>Child <span>1</span></label>
					<input type="text" name="" class="child_name" id="" placeholder="Childs Name" value=""/>
				</div>				
			</div>
			
			
			
			
			<div class="row submit_buttons">
				<button class="btn" id="submit_profile">Invite Tenant</button>
			</div>
			
			<input type="hidden" name="property_id" id="property_id" value="{{$apartment->id}}" />
		</form>
		
	</div>

	
	
			<br />
    
@endsection
