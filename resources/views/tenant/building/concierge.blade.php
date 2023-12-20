
@extends('tenant.index')
@section('title')
Concierge
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Concierge</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	    

    <div class="container delivery">
    
        <div class="errors"></div>
        
        <h2><img src="{{asset('img/building_sub.png')}}" alt="Concierge Details">Concierge Details</h2>
    
        <div class="delivery_form">
            
            <form action="{{route('mybuilding.conciergesend')}}" method="post">
                @csrf
                <h3>Concierge Service:</h3>
                <div class="row">
                    <div class="field">
                        <label for="service_type">What Would You Like To Do?</label>
                        <select name="service_type" id="service_type">
                            <option value="">Please Select</option>
                            <option value="38">Schedule a delivery</option>
                            <option value="2007">Schedule a pickup</option>
                            <option value="2006">Schedule a visitor</option>
                        </select>
                    </div>
                </div>
            
                <div class="">
                
                    <h3 class="date_text">Date of delivery:</h3>
                    <div class="row dob_row">
                        <div class="field">
                            <label for="month">Month</label>
                            <select name="month" id="month">
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
                        <div class="field">
                            <label for="day">Day</label>
                            <select name="day" id="day">
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
                                                                <option  value="14">14</option>
                                                                <option  value="15">15</option>
                                                                <option  value="16">16</option>
                                                                <option  value="17">17</option>
                                                                <option  value="18">18</option>
                                                                <option  value="19">19</option>
                                                                <option  value="20">20</option>
                                                                <option  value="21">21</option>
                                                                <option selected="selected" value="22">22</option>
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
                        <div class="field">
                            <label for="year">Year</label>
                            <select name="year" id="year">
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
                        <div class="field">
                            <input type="text" style="padding:0 !important;width:0 !important;border:0 !important;" name="picker" id="picker" />
                            <img class="calendar_picker" src="{{asset('img/calendar-pick.png')}}" /> 
                        </div>
                    </div>
                    
                    <h3 class="time_text">Estimated time of delivery:</h3>
                    <div class="row">
                        <div class="field">
                            <label for="estimated_time">Time</label>
                            <select name="estimated_time" id="estimated_time">
                                                                <option value="00:00">								
                                                                                Midnight
                                                                                                            
                                    </option>
    
                                    <option value="00:30">								
                                                                                12:30 AM
                                            
                                    </option>	
                                                                <option value="01:00">								
                                                                                                                                                                            1:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="01:30">								
                                                                                                                                                                            1:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="02:00">								
                                                                                                                                                                            2:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="02:30">								
                                                                                                                                                                            2:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="03:00">								
                                                                                                                                                                            3:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="03:30">								
                                                                                                                                                                            3:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="04:00">								
                                                                                                                                                                            4:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="04:30">								
                                                                                                                                                                            4:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="05:00">								
                                                                                                                                                                            5:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="05:30">								
                                                                                                                                                                            5:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="06:00">								
                                                                                                                                                                            6:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="06:30">								
                                                                                                                                                                            6:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="07:00">								
                                                                                                                                                                            7:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="07:30">								
                                                                                                                                                                            7:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="08:00">								
                                                                                                                                                                            8:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="08:30">								
                                                                                                                                                                            8:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="09:00">								
                                                                                                                                                                            9:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="09:30">								
                                                                                                                                                                            9:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="10:00">								
                                                                                                                                                                            10:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="10:30">								
                                                                                                                                                                            10:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="11:00">								
                                                                                                                                                                            11:00 AM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="11:30">								
                                                                                                                                                                            11:30 AM
                                                                                                                                
                                    </option>	
                                                                <option value="12:00">								
                                                                                                                            Midday
                                                                                                                                                    
                                    </option>
    
                                    <option value="12:30">								
                                                                                                                            12:30 PM
                                                                                    
                                    </option>	
                                                                <option value="13:00">								
                                                                                                                                                                            1:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="13:30">								
                                                                                                                                                                            1:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="14:00">								
                                                                                                                                                                            2:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="14:30">								
                                                                                                                                                                            2:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="15:00">								
                                                                                                                                                                            3:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="15:30">								
                                                                                                                                                                            3:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="16:00">								
                                                                                                                                                                            4:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="16:30">								
                                                                                                                                                                            4:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="17:00">								
                                                                                                                                                                            5:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="17:30">								
                                                                                                                                                                            5:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="18:00">								
                                                                                                                                                                            6:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="18:30">								
                                                                                                                                                                            6:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="19:00">								
                                                                                                                                                                            7:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="19:30">								
                                                                                                                                                                            7:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="20:00">								
                                                                                                                                                                            8:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="20:30">								
                                                                                                                                                                            8:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="21:00">								
                                                                                                                                                                            9:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="21:30">								
                                                                                                                                                                            9:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="22:00">								
                                                                                                                                                                            10:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="22:30">								
                                                                                                                                                                            10:30 PM
                                                                                                                                
                                    </option>	
                                                                <option value="23:00">								
                                                                                                                                                                            11:00 PM
                                                                                                                                                                                                
                                    </option>
    
                                    <option value="23:30">								
                                                                                                                                                                            11:30 PM
                                                                                                                                
                                    </option>	
                                                        </select>
                        </div>
                    </div>
                                
                    <h3 class="items_text">Items to be delivered:</h3>
                    <div class="delivery_items" id="delivery_items">
                        <div class="row" id="delivery_item_template">
                            <div class="field">
                                <label for="item">Item</label>
                                <input type="text" name="item" class="item_name" />						
                            </div>
                            <div class="field control_buttons">
                                <ul>
                                    <li><a href="#" class="remove">Remove</a></li>
                                    <li><a href="#" class="add_new">Add Another</a></li>
                                </ul>
                            </div>					
                        </div>
                    </div>
                    
                    <div class="row submit_buttons">
                    <div class="field">
                        <button id="save_delivery_request" class="btn">Submit</button>
                    </div>	
                </div>
            </div>
                
            </form>
            
        </div>
        
    </div>
    
    <div class="confirmation">
        <div class="fullscreen_container">
        
            <div class="fullscreen_container_inner">
                
                <div class="fullscreen_with_icon">		
                    <p class="confirmation_text">Your item has been scheduled for delivery.</p>
                    <div class="fs_icon_container"><img src="{{asset('img/delivery_darkblue.png')}}" alt="icon"></div>
                </div>
                            
                <p class="fullscreen_message">				
                    Please contact us if you have any further requests.
                </p>			
                
                <p class="fullscreen_button">
                    <a class="back_to_button" href="/my_building/deliveries" title="Back to deliveries">Back To Deliveries</a>
                    <a href="/" title="Go To Dashboard">Go To Dashboard</a>
                </p>
                
            </div>
            
        </div>
    </div>
    
        
        
                <br />


                
    
@endsection

