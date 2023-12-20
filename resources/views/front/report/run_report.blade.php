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
	
	    
	
	<div class="container run_report">

		
			<form action="{{route('runreport.create')}}" method="post" enctype="multipart/form-data">
                @csrf		
							
				<div class="row date_layout">
					<h3>Select a date range:</h3>
					<p>Start Date</p>
					<div class="field month">						
						<select name="from_month" id="from_month">
															<option  value="1">January</option>
															<option  value="2">February</option>
															<option  value="3">March</option>
															<option  value="4">April</option>
															<option  value="5">May</option>
															<option  value="6">June</option>
															<option  value="7">July</option>
															<option  value="8">August</option>
															<option  value="9">September</option>
															<option  value="10">October</option>
															<option selected="selected" value="11">November</option>
															<option  value="12">December</option>
													</select>
					</div>	
					<div class="field day">					
						<select name="from_day" id="from_day">
															<option  value="1">1</option>
															<option  value="2">2</option>
															<option  value="3">3</option>
															<option  value="4">4</option>
															<option  value="5">5</option>
															<option  value="6">6</option>
															<option  value="7">7</option>
															<option  value="8">8</option>
															<option  value="9">9</option>
															<option  value="10">10</option>
															<option  value="11">11</option>
															<option  value="12">12</option>
															<option  value="13">13</option>
															<option selected="selected" value="14">14</option>
															<option  value="15">15</option>
															<option  value="16">16</option>
															<option  value="17">17</option>
															<option  value="18">18</option>
															<option  value="19">19</option>
															<option  value="20">20</option>
															<option  value="21">21</option>
															<option  value="22">22</option>
															<option  value="23">23</option>
															<option  value="24">24</option>
															<option  value="25">25</option>
															<option  value="26">26</option>
															<option  value="27">27</option>
															<option  value="28">28</option>
															<option  value="29">29</option>
															<option  value="30">30</option>
															<option  value="31">31</option>
													</select>
					</div>	
					<div class="field year">					
						<select name="from_year" id="from_year">
																						<option  value="2012">2012</option>
															<option  value="2013">2013</option>
															<option  value="2014">2014</option>
															<option  value="2015">2015</option>
															<option  value="2016">2016</option>
															<option  value="2017">2017</option>
															<option  value="2018">2018</option>
															<option  value="2019">2019</option>
															<option  value="2020">2020</option>
															<option  value="2021">2021</option>
															<option selected="selected" value="2022">2022</option>
															<option  value="2023">2023</option>
															<option  value="2024">2024</option>
															<option  value="2025">2025</option>
															<option  value="2026">2026</option>
															<option  value="2027">2027</option>
															<option  value="2028">2028</option>
															<option  value="2029">2029</option>
															<option  value="2030">2030</option>
															<option  value="2031">2031</option>
															<option  value="2032">2032</option>
													</select>
					</div>
					<div class="field field_date_picker">
						<input type="text" style="padding:0 !important;width:0 !important;border:0 !important;" name="picker_from" id="picker_from" />
						<img class="calendar_picker" id="calendar_picker_from" src="{{asset('img/calendar-pick.png')}}" /> 
					</div>
				</div>
				
				<div class="row date_layout">
					<p>End Date</p>
					<div class="field month">										
						<select name="to_month" id="to_month">
															<option  value="1">January</option>
															<option  value="2">February</option>
															<option  value="3">March</option>
															<option  value="4">April</option>
															<option  value="5">May</option>
															<option  value="6">June</option>
															<option  value="7">July</option>
															<option  value="8">August</option>
															<option  value="9">September</option>
															<option  value="10">October</option>
															<option selected="selected" value="11">November</option>
															<option  value="12">December</option>
													</select>
					</div>	
					<div class="field day">					
						<select name="to_day" id="to_day">
															<option  value="1">1</option>
															<option  value="2">2</option>
															<option  value="3">3</option>
															<option  value="4">4</option>
															<option  value="5">5</option>
															<option  value="6">6</option>
															<option  value="7">7</option>
															<option  value="8">8</option>
															<option  value="9">9</option>
															<option  value="10">10</option>
															<option  value="11">11</option>
															<option  value="12">12</option>
															<option  value="13">13</option>
															<option selected="selected" value="14">14</option>
															<option  value="15">15</option>
															<option  value="16">16</option>
															<option  value="17">17</option>
															<option  value="18">18</option>
															<option  value="19">19</option>
															<option  value="20">20</option>
															<option  value="21">21</option>
															<option  value="22">22</option>
															<option  value="23">23</option>
															<option  value="24">24</option>
															<option  value="25">25</option>
															<option  value="26">26</option>
															<option  value="27">27</option>
															<option  value="28">28</option>
															<option  value="29">29</option>
															<option  value="30">30</option>
															<option  value="31">31</option>
													</select>
					</div>	
					<div class="field year">					
						<select name="to_year" id="to_year">
																						<option  value="2012">2012</option>
															<option  value="2013">2013</option>
															<option  value="2014">2014</option>
															<option  value="2015">2015</option>
															<option  value="2016">2016</option>
															<option  value="2017">2017</option>
															<option  value="2018">2018</option>
															<option  value="2019">2019</option>
															<option  value="2020">2020</option>
															<option  value="2021">2021</option>
															<option selected="selected" value="2022">2022</option>
															<option  value="2023">2023</option>
															<option  value="2024">2024</option>
															<option  value="2025">2025</option>
															<option  value="2026">2026</option>
															<option  value="2027">2027</option>
															<option  value="2028">2028</option>
															<option  value="2029">2029</option>
															<option  value="2030">2030</option>
															<option  value="2031">2031</option>
															<option  value="2032">2032</option>
													</select>
					</div>
					<div class="field field_date_picker">
						<input type="text" style="padding:0 !important;width:0 !important;border:0 !important;" name="picker_to" id="picker_to" />
						<img class="calendar_picker" id="calendar_picker_to" src="{{asset('img/calendar-pick.png')}}" /> 
					</div>
				</div>
				
								
				<div class="row">
					<h3>Select a category:</h3>
					<div class="field">					
						<select name="category" id="category">
                            @foreach($task as $item)
							<option value="">All Categories</option>
							<option value="{{$item->id}}">{{$item->description}}</option>
							@endforeach								
						</select>
					</div>						
				</div>
				
				<div class="row">
					<h3>Select data:</h3>
					<div class="chk_row">
						<input type="checkbox" name="chkRequests" value="1" id="chkRequests" /><label for="chkRequests"></label><span>Requests</span>
					</div>
					
					<div class="chk_row">
						<input type="checkbox" name="chkAvgTime" value="1" id="chkAvgTime" /><label for="chkAvgTime"></label><span>Average Time Completion</span>
					</div>
					
					<div class="chk_row">
						<input type="checkbox" name="chkAssignmentsByStaff" value="1" id="chkAssignmentsByStaff" /><label for="chkAssignmentsByStaff"></label><span>Assignments By Staff</span>
					</div>
				</div>
				
				<div class="row">
					<div class="field button_group">
						<button type="submit" id="run_report_button" class="btn">Run Report</button>
					</div>					
				</div>
				
			</form>		
	
	</div>

	
	
			<br />
    
@endsection

