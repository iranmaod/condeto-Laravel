
@extends('tenant.index')
@section('title')
Resources
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Resources</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	    

    <div class="container building_resources">
        
        <div class="errors"></div>
        
        <h2><img src="{{asset('img/resources.png')}}" />Resources - Tenant Information</h2>
            
        <ul class="standard_listing resource_listing">
                        
                                <li>
                        <div class="resource_container" data-id="304">
                            <p>Title : Tenants Rights and Responsibilities</p>
                            <p>A list of your rights and responsibilities as a tenant.<br />
                            Date Published : <date>{{date('F d, Y')}}</date>
                            </p>						
                            <p><a class="button mini_button" href="{{asset('apt_apply_assets/tenants_rights_and_responsibilities.pdf')}}" target="_blank">Download</a></p>
                        </div>
                    </li>
                            
                </ul>
        
    </div>
    
        
        
                <br />


                
    
@endsection

