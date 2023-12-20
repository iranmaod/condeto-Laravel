@extends('tenant.index')
@section('title')
Reserve Facility
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Reserve Facility</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	   
    <div class="container book_facility">
         <div class="row">
             <h2><img src="{{asset('img/calendar_question.png')}}" alt="Book a facility">Facility Details</h2>
             
             <form action="{{route('myfacility.book')}}" method="post">
                @csrf
             
                 <h3>Facility you would like to book:</h3>
                 <div class="row">
                     <div class="field facility">						
                         <select id="mySelect" onchange="myFunction()" name="facility" id="facility">
                                                         
                            <option value="1">Purple Basketball Court</option>

                
                            <option value="2">Main Meeting Room</option>

                
                            <option value="3">Swimming Pool</option>
    
                        </select>
                        
                     </div>
                 </div>
                 




                 <div style="display: block" id="facility_image1" class="facility_details">					
                     <div class="facility_image_text_container">
                         <p  >
                            <img src="{{asset('img/facility_1.jpg')}}" alt="">
                         </p>
                         
                         <div class="facility_text">
                             <p class="facility_name"><span id="facility_name"></span></p>
                             <p class="facility_description"><span id="facility_description"></span></p>						
                         </div>
                     </div>
                     <p style="display:none !important" class="facility_minimum_blocks"><strong>Minimum Booking Blocks : </strong> <span id="facility_minimum_blocks"></span></p>
                     <p style="display:none !important" class="facility_maximum_blocks"><strong>Maximum Booking Blocks : </strong> <span id="facility_maximum_blocks"></span></p>
                     <p class="cost_per_block"><strong>Cost Per Block : $5.00 </strong> <span id="cost_per_block"></span></p>
                 </div>
                 <div style="display: none" id="facility_image2" class="facility_details">					
                     <div class="facility_image_text_container">
                         <p  >
                            <img src="{{asset('img/facility_2.jpg')}}" alt="">
                         </p>
                         
                         <div class="facility_text">
                             <p class="facility_name"><span id="facility_name"></span></p>
                             <p class="facility_description"><span id="facility_description"></span></p>						
                         </div>
                     </div>
                     <p class="facility_location"><strong>Location : Center of the block </strong> <span id="facility_location"></span></p>
                     <p style="display:none !important" class="facility_minimum_blocks"><strong>Minimum Booking Blocks : </strong> <span id="facility_minimum_blocks"></span></p>
                     <p style="display:none !important" class="facility_maximum_blocks"><strong>Maximum Booking Blocks : </strong> <span id="facility_maximum_blocks"></span></p>
                     <p class="cost_per_block"><strong>Cost Per Block : $15.00 </strong> <span id="cost_per_block"></span></p>
                 </div>
                 <div style="display: none" id="facility_image3" class="facility_details">					
                     <div class="facility_image_text_container">
                         
                         <p  >
                            <img src="{{asset('img/facility_3.jpg')}}" alt="">
                         </p>
                        
                         <div class="facility_text">
                             <p class="facility_name"><span id="facility_name"></span></p>
                             <p class="facility_description"><span id="facility_description"></span></p>						
                         </div>
                     </div>
                     <p style="display:none !important" class="facility_minimum_blocks"><strong>Minimum Booking Blocks : </strong> <span id="facility_minimum_blocks"></span></p>
                     <p style="display:none !important" class="facility_maximum_blocks"><strong>Maximum Booking Blocks : </strong> <span id="facility_maximum_blocks"></span></p>
                 </div>
                 




                 <h3>Scroll to see availability for {{date('l, d F, Y ')}} <span class="availability_date"></span>:</h3>
                 <div class="row available_row">
                     <ul>
                                                 <li class="time_position">
                             <span>
                                 
                                                                     12AM
                                     
                             
                             </span>
                         </li>
                         <li class="" data-time="00:00"></li>
                         <!--<li class="" data-time="00:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         1AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="01:00"></li>
                         <!--<li class="" data-time="01:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         2AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="02:00"></li>
                         <!--<li class="" data-time="02:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         3AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="03:00"></li>
                         <!--<li class="" data-time="03:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         4AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="04:00"></li>
                         <!--<li class="" data-time="04:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         5AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="05:00"></li>
                         <!--<li class="" data-time="05:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         6AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="06:00"></li>
                         <!--<li class="" data-time="06:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         7AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="07:00"></li>
                         <!--<li class="" data-time="07:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         8AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="08:00"></li>
                         <!--<li class="" data-time="08:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         9AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="09:00"></li>
                         <!--<li class="" data-time="09:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         10AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="unavailable" data-time="10:00"></li>
                         <!--<li class="unavailable" data-time="10:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         11AM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="11:00"></li>
                         <!--<li class="" data-time="11:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                             12PM
                                                                         
                             
                             </span>
                         </li>
                         <li class="" data-time="12:00"></li>
                         <!--<li class="" data-time="12:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         1PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="13:00"></li>
                         <!--<li class="" data-time="13:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         2PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="14:00"></li>
                         <!--<li class="" data-time="14:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         3PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="15:00"></li>
                         <!--<li class="" data-time="15:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         4PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="16:00"></li>
                         <!--<li class="" data-time="16:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         5PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="17:00"></li>
                         <!--<li class="" data-time="17:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         6PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="18:00"></li>
                         <!--<li class="" data-time="18:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         7PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="19:00"></li>
                         <!--<li class="" data-time="19:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         8PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="20:00"></li>
                         <!--<li class="" data-time="20:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         9PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="21:00"></li>
                         <!--<li class="" data-time="21:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         10PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="22:00"></li>
                         <!--<li class="" data-time="22:30"></li>-->
                                                 <li class="time_position">
                             <span>
                                 
                                                                                                                                                         11PM
                                                                                                                 
                             
                             </span>
                         </li>
                         <li class="" data-time="23:00"></li>
                         <!--<li class="" data-time="23:30"></li>-->
                                             </ul>
                 </div>
                 
                 <h3>Date and time to book facility:</h3>
                 <div class="row dob_row">
                     <div class="field month">
                         <label for="month">Month</label>
                         <select name="month" id="month">
                                                             <option   value="1">January</option>
                                                             <option   value="2">February</option>
                                                             <option   value="3">March</option>
                                                             <option   value="4">April</option>
                                                             <option   value="5">May</option>
                                                             <option   value="6">June</option>
                                                             <option   value="7">July</option>
                                                             <option   value="8">August</option>
                                                             <option   value="9">September</option>
                                                             <option   value="10">October</option>
                                                             <option   selected="selected"  value="11">November</option>
                                                             <option   value="12">December</option>
                                                     </select>
                     </div>	
                     <div class="field day">
                         <label for="day">Day</label>
                         <select name="day" id="day">
                                                             <option   value="1">1</option>
                                                             <option   value="2">2</option>
                                                             <option   value="3">3</option>
                                                             <option   value="4">4</option>
                                                             <option   value="5">5</option>
                                                             <option   value="6">6</option>
                                                             <option   value="7">7</option>
                                                             <option   value="8">8</option>
                                                             <option   value="9">9</option>
                                                             <option   value="10">10</option>
                                                             <option   value="11">11</option>
                                                             <option   value="12">12</option>
                                                             <option   value="13">13</option>
                                                             <option   value="14">14</option>
                                                             <option   value="15">15</option>
                                                             <option   value="16">16</option>
                                                             <option   value="17">17</option>
                                                             <option   value="18">18</option>
                                                             <option   value="19">19</option>
                                                             <option   value="20">20</option>
                                                             <option   value="21">21</option>
                                                             <option   value="22">22</option>
                                                             <option   value="23">23</option>
                                                             <option   value="24">24</option>
                                                             <option   selected="selected"  value="25">25</option>
                                                             <option   value="26">26</option>
                                                             <option   value="27">27</option>
                                                             <option   value="28">28</option>
                                                             <option   value="29">29</option>
                                                             <option   value="30">30</option>
                                                             <option   value="31">31</option>
                                                     </select>
                     </div>	
                     <div class="field year">
                         <label for="year">Year</label>
                         <select name="year" id="year">
                                                                                         <option   selected="selected" ( value="2022">2022</option> 
                                                             <option  ( value="2023">2023</option> 
                                                             <option  ( value="2024">2024</option> 
                                                             <option  ( value="2025">2025</option> 
                                                             <option  ( value="2026">2026</option> 
                                                             <option  ( value="2027">2027</option> 
                                                             <option  ( value="2028">2028</option> 
                                                             <option  ( value="2029">2029</option> 
                                                             <option  ( value="2030">2030</option> 
                                                             <option  ( value="2031">2031</option> 
                                                             <option  ( value="2032">2032</option> 
                                                     </select>
                     </div>
                     <div class="field field_date_picker">
                         <input type="text" style="padding:0 !important;width:0 !important;border:0 !important;" name="picker" id="picker" />
                         <img class="calendar_picker" src="{{asset('img/calendar-pick.png')}}" /> 
                     </div>					
                 </div>
                 
                 <div class="row">
                     <div class="field time_from">
                         <label for="from">From</label>
                         <select name="from" id="from">
                             
                                 <option selected="selected" value="00:00">
                                                                     Midnight
                                     
                                 </option>
 
                                 <!--<option selected="selected" value="00:30">00:30AM</option>-->
 
                             
                                 <option  value="01:00">
                                                                                                                                                         1 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="01:30">01:30AM</option>-->
 
                             
                                 <option  value="02:00">
                                                                                                                                                         2 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="02:30">02:30AM</option>-->
 
                             
                                 <option  value="03:00">
                                                                                                                                                         3 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="03:30">03:30AM</option>-->
 
                             
                                 <option  value="04:00">
                                                                                                                                                         4 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="04:30">04:30AM</option>-->
 
                             
                                 <option  value="05:00">
                                                                                                                                                         5 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="05:30">05:30AM</option>-->
 
                             
                                 <option  value="06:00">
                                                                                                                                                         6 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="06:30">06:30AM</option>-->
 
                             
                                 <option  value="07:00">
                                                                                                                                                         7 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="07:30">07:30AM</option>-->
 
                             
                                 <option  value="08:00">
                                                                                                                                                         8 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="08:30">08:30AM</option>-->
 
                             
                                 <option  value="09:00">
                                                                                                                                                         9 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="09:30">09:30AM</option>-->
 
                             
                                 <option  value="10:00">
                                                                                                                                                         10 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="10:30">10:30AM</option>-->
 
                             
                                 <option  value="11:00">
                                                                                                                                                         11 AM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="11:30">11:30AM</option>-->
 
                             
                                 <option  value="12:00">
                                                                                                             Midday
                                                                         
                                 </option>
 
                                 <!--<option  value="12:30">12:30PM</option>-->
 
                             
                                 <option  value="13:00">
                                                                                                                                                         1 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="13:30">1:30PM</option>-->
 
                             
                                 <option  value="14:00">
                                                                                                                                                         2 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="14:30">2:30PM</option>-->
 
                             
                                 <option  value="15:00">
                                                                                                                                                         3 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="15:30">3:30PM</option>-->
 
                             
                                 <option  value="16:00">
                                                                                                                                                         4 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="16:30">4:30PM</option>-->
 
                             
                                 <option  value="17:00">
                                                                                                                                                         5 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="17:30">5:30PM</option>-->
 
                             
                                 <option  value="18:00">
                                                                                                                                                         6 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="18:30">6:30PM</option>-->
 
                             
                                 <option  value="19:00">
                                                                                                                                                         7 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="19:30">7:30PM</option>-->
 
                             
                                 <option  value="20:00">
                                                                                                                                                         8 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="20:30">8:30PM</option>-->
 
                             
                                 <option  value="21:00">
                                                                                                                                                         9 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="21:30">9:30PM</option>-->
 
                             
                                 <option  value="22:00">
                                                                                                                                                         10 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="22:30">10:30PM</option>-->
 
                             
                                 <option  value="23:00">
                                                                                                                                                         11 PM
                                                                                                                 
                                 </option>
 
                                 <!--<option  value="23:30">11:30PM</option>-->
 
                                                     </select>
                     </div>	
                     <div class="field">
                         <label for="to">To</label>
                         <select name="to" id="to">
                                                             <option selected="selected" value="00:00">
                                                                     Midnight
                                     
                                 </option>
                                 
                                 <!--<option selected="selected" value="00:30">00:30AM</option>-->
                                                             <option  value="01:00">
                                                                                                                                                         1 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="01:30">01:30AM</option>-->
                                                             <option  value="02:00">
                                                                                                                                                         2 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="02:30">02:30AM</option>-->
                                                             <option  value="03:00">
                                                                                                                                                         3 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="03:30">03:30AM</option>-->
                                                             <option  value="04:00">
                                                                                                                                                         4 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="04:30">04:30AM</option>-->
                                                             <option  value="05:00">
                                                                                                                                                         5 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="05:30">05:30AM</option>-->
                                                             <option  value="06:00">
                                                                                                                                                         6 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="06:30">06:30AM</option>-->
                                                             <option  value="07:00">
                                                                                                                                                         7 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="07:30">07:30AM</option>-->
                                                             <option  value="08:00">
                                                                                                                                                         8 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="08:30">08:30AM</option>-->
                                                             <option  value="09:00">
                                                                                                                                                         9 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="09:30">09:30AM</option>-->
                                                             <option  value="10:00">
                                                                                                                                                         10 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="10:30">10:30AM</option>-->
                                                             <option  value="11:00">
                                                                                                                                                         11 AM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="11:30">11:30AM</option>-->
                                                             <option  value="12:00">
                                                                                                             Midday
                                                                         
                                 </option>
                                 
                                 <!--<option  value="12:30">12:30PM</option>-->
                                                             <option  value="13:00">
                                                                                                                                                         1 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="13:30">1:30PM</option>-->
                                                             <option  value="14:00">
                                                                                                                                                         2 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="14:30">2:30PM</option>-->
                                                             <option  value="15:00">
                                                                                                                                                         3 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="15:30">3:30PM</option>-->
                                                             <option  value="16:00">
                                                                                                                                                         4 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="16:30">4:30PM</option>-->
                                                             <option  value="17:00">
                                                                                                                                                         5 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="17:30">5:30PM</option>-->
                                                             <option  value="18:00">
                                                                                                                                                         6 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="18:30">6:30PM</option>-->
                                                             <option  value="19:00">
                                                                                                                                                         7 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="19:30">7:30PM</option>-->
                                                             <option  value="20:00">
                                                                                                                                                         8 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="20:30">8:30PM</option>-->
                                                             <option  value="21:00">
                                                                                                                                                         9 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="21:30">9:30PM</option>-->
                                                             <option  value="22:00">
                                                                                                                                                         10 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="22:30">10:30PM</option>-->
                                                             <option  value="23:00">
                                                                                                                                                         11 PM
                                                                                                                 
                                 </option>
                                 
                                 <!--<option  value="23:30">11:30PM</option>-->
                                                     </select>
                     </div>
                 </div>
                 
                 <div class="row errors" id="error">
                 
                 </div>
                 
                 <div class="row submit_buttons">
                     <div class="field">						
                         <button id="is_available_button" class="btn">Check Availability</button>
                         <p id="available_result"></p>
                         <p id="total_cost"></p>
                         <div class="submit_group">
                             <input type="submit" id="submit_request" class="btn" value="Request Booking" />
                         </div>						
                     </div>					
                 </div>
                                 
             </form>
                               
         </div>
     </div>
 
     
     
             <br />
    
@endsection


@section('js')

<script>
    var facility_1 = document.getElementById("facility_image1");
    var facility_2 = document.getElementById("facility_image2");
    var facility_3 = document.getElementById("facility_image3");
    

// function showImage(){
//     facility_1.style.display = "block";
//     facility_2.style.display = "none";
//     facility_3.style.display = "none";
  
// }

function myFunction() {
  var x = document.getElementById("mySelect").value;
  if(x == '1')
  {
    // alert('1');
    facility_1.style.display = "block";
    facility_2.style.display = "none";
    facility_3.style.display = "none";
   
  }
  else if(x == '2')
  {
    // alert('2');
    facility_1.style.display = "none";
    facility_2.style.display = "block";
    facility_3.style.display = "none";
  }
  else if(x == '3')
  {
    // alert('3');
    facility_1.style.display = "none";
    facility_2.style.display = "none";
    facility_3.style.display = "block";
  }
//   document.getElementById("demo").innerHTML = "You selected: " + x;
}




</script>

@endsection