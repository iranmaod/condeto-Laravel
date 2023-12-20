@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
@endsection
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

	    

    <div class="container repair_categories">
        
        <div class="errors"></div>
        
        <p>Please select the service you need assistance with from the list below, alternatively, you can <a href="/my_building/repairs/my_repairs">check repair status</a> here.</p>
        
        <div class="repair_type_list">
            <ul>
        @foreach ($task as $item)
        <li>
          
           
        <div class="category_container" data-id="2011" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
        
            <p >{{$item->description}}</p>
            
        </div>
       
        
        </li>

        <form action="{{route('sendreq.repairs')}}" method="POST">
            @csrf

            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <input type="hidden" value="{{$item->id}}" name="type_id">
                    <div class="modal-body">
                        <div class="repair_detail" style="display: block;">
                            <textarea name="repair_detail" id="repair_detail" placeholder="Please describe your issue"></textarea>
                            <div class="checkbox_area">
                               
                                <label for="okayToEnter">Okay to enter apartment for repair without resident present? <input type="checkbox" name="okayToEnter" id="okayToEnter" value="1"></label>
                            </div>		
                            <p>We'll get back to you via email as soon as possible.</p>
                            <button class="button" id="repair_submit">Submit</button>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn mini_button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
       



        @endforeach              
                    
        </ul>
        </div>
        
        <div class="repair_detail">
            <textarea name="repair_detail" id="repair_detail" placeholder="Please describe your issue"></textarea>
            <div class="checkbox_area">
                <label for="okayToEnter">Okay to enter apartment for repair without resident present? <input type="checkbox" name="okayToEnter" id="okayToEnter" value="1" /></label>
            </div>		
            <p>We'll get back to you via email as soon as possible.</p>
            <button class="button" id="repair_submit">Submit</button>
        </div>
            
    </div>
    






    <div class="confirmation">
        <div class="fullscreen_container">
        
            <div class="fullscreen_container_inner">
                
                <div class="fullscreen_with_image">		
                    <p>
                    Thank you
                    </p>				
                    <div class="fullscreen_image_container" style="background-image:url(/apt_apply_assets/images/avatars/sample2.jpg)">
                        <img src="/apt_apply_assets/images/avatars/sample2.jpg" alt="Confirmation Image" />
                    </div>
                    <p class="image_heading">Leon Wilson</p>
                    <p class="image_sub_heading">Repairs Manager</p>				
                </div>
                            
                <p class="fullscreen_message">				
                    We have received your repair request and will be in contact with you shortly.
                </p>			
                
                <p class="fullscreen_button">
                    <a href="/my_building/repairs" title="Go To Repairs">Back To Repairs</a>
                    <a href="/" title="Go To Dashboard">Go To Dashboard</a>
                </p>
                
            </div>
            
        </div>
    </div>
    
        
        
                <br />


                
    
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
@endsection