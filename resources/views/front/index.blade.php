@extends('layouts.app')
@section('title')
Condeto
@endsection

@section('content')
<div class="logged_in_role" style="display:none">
    Complex Manager
</div>

@yield('header')
    
<div class="main_content_area ">

        <div class="menu">

        <div class="footer_toolbar_padding">
    </div>
    <div style="height: 100% !important;" class="footer_toolbar">
        <ul>
                                            
                                    
                <li>
                    <a href="/dashboard" >	
                                                    <img src="{{asset('img/dashboard.png')}}">
                        <span>Dashboard</span>
                    </a>
                </li>
                
                    
                                
                            
                                    
                <li>
                    <a href="/my_building/tasks_staff" >	
                                                    <img src="{{asset('img/tasks-white.png')}}">
                        <span>Tasks</span>
                    </a>
                </li>
                
                    
                                
                            
                                    
                <li>
                    <a href="/reports" >	
                                                    <img src="{{asset('img/reports.png')}}">
                        <span>Reports</span>
                    </a>
                </li>
                
                    
                                
                            
                                    
                <li>
                    <a href="/messages" >	
                                                    <span class="counter toolbar_unread_messages"  style="display:none" >0</span>
                                                    <img src="{{asset('img/message.png')}}">
                        <span>Messages</span>
                    </a>
                </li>
                
                    
                                
                            
                                        <li>
                    <a href="#" class="more">
                        <span class="fa fa-ellipsis-h"></span>
                        <span>More</span>
                    </a>
                    <ul>
                                    
                <li>
                    <a href="/building" >	
                                                    <img src="{{asset('img/building.png')}}">
                        <span>Manage Building</span>
                    </a>
                </li>
                
                    
                                
                            
                                    
                <li>
                    <a href="/profile" >	
                                                    <img src="{{asset('img/account.png')}}">
                        <span>Account</span>
                    </a>
                </li>
                
                
                <li >
                    
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img src="{{asset('img/logout.png')}}">
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                
                    
                                
            
                                </li>
            </ul>
                            
        </ul>
        
    </div>
    
</div>
    <div class="main_content">

    

<div class="container tenant_dashboard">
    

    
    <main class="">
        @yield('dashboard')
    </main>
        
</div>



        <br />
    <div class="main_footer_area">
                    <p class="powered_by"><img src="{{asset('img/condeto_logo.jpg')}}" alt="Condeto Logo"/>Powered by Condeto</p>
    </div>
    
</div>

</div>	

        
    
<div class="please_wait_container">
    <div class="please_wait_inner">
        <p>Please wait while we upload your document.</p>
        <div class="sk-cube-grid">
          <div class="sk-cube sk-cube1"></div>
          <div class="sk-cube sk-cube2"></div>
          <div class="sk-cube sk-cube3"></div>
          <div class="sk-cube sk-cube4"></div>
          <div class="sk-cube sk-cube5"></div>
          <div class="sk-cube sk-cube6"></div>
          <div class="sk-cube sk-cube7"></div>
          <div class="sk-cube sk-cube8"></div>
          <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
</div>
@endsection
