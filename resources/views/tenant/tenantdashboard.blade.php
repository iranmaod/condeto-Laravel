@extends('tenant.index')
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Welcome Back {{Auth::user()->first_name}}</h1>
                     
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	
@endsection
<div class="row">
    <h2><img src="{{asset('img/building_sub.png')}}" alt="My Building">My Building</h2>
    <ul class="dashboard_notifications">
    
        
 
        
    </ul>
</div>	
    
@endsection