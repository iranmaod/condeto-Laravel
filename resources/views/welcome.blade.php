@extends('layouts.app')

@section('content')


<div class="logged_in_role" style="display:none">
		
</div>



<div class="main_content_area ">

        <div class="menu">



</div>
    <div class="main_content">

    

<div style="background-image: url({{url('img/background_image.jpg')}})" class="welcome_area">
    <div class="welcome_inner">

        <img src="{{asset('img/condeto_logo.png')}}" class="apt_apply_logo" />
        <p class="slogan">Property Management Simplified</p>
        <p style="display:none"></p>
        
        <a href="#" class="next_step" title="next step"><img src="{{asset('img/right_arrow.png')}}" /></a>
        
        <p class="confirmation_message"></p>
        
        <div class="login_form">
            <p class="loginErrorMessage"></p>
        
            <form id='login' action='{{ route('login') }}' method='post' accept-charset='UTF-8'>
                @csrf


                
                    <label for='username' ><span class="fa fa-user"></span></label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="checkbox_area" >
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  /><label for="save_username">Save UserID</label>
                    </div>
                

                    <div class="col-md-6">
                        <label for='password' ><span class="fa fa-key"></span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox_area" >
                        <input type="checkbox" name="persist_login" id="persist_login" value="1" /><label for="persist_login">Stay Logged In</label>
                    </div>
              

                    <input type='submit' class="btn btn-primary" id="Submitlogin2" name='Submitlogin' value='Sign In'>
             
            </form>
            
            <ul class="login_footer_links">
                <li><a href="#" class="forgot_password">Forgot your password?</a></li>
                <li><a href="#" class="show_register">New Tenant? <span>Sign Up</span></a></li>
            </ul>
            
        </div>
        
        <div class="register_form">
            <p class="registerErrorMessage"></p>
            
            <p style="font-weight:bold;margin-bottom:10px;margin-left:20px;margin-right:20px;">Are you a new tenant of a management company using Condeto? If so, create your account login here.<br />For any other scenarios or questions about signup, please reach out to <a href="mailto:info@condeto.com">info@condeto.com</a></p>
         

            <form method="POST" action="{{ route('register') }}">
                @csrf
            
                <div class="row mb-3">
                    <label for='regemail' ><span class="fa fa-user"></span></label>
            
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for='regemail' ><span class="fa fa-user"></span></label>
            
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for='regpassword' ><span class="fa fa-key"></span></label>
            
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for='regpassword' ><span class="fa fa-key"></span></label>
            
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <input type='submit' class="btn btn-primary" name='RegisterSubmit2' id="RegisterSubmit2" value='Register'>
                    </div>
                </div>
            </form>
            
            <ul class="login_footer_links">
                <li><a href="#" class="signin">Member Already? <span>Sign In</span></a></li>
                <li><a href="#" class="forgot_password">Forgot your password?</a></li>					
            </ul>
        </div>
        
        <div class="forgot_password_form">
            <p class="forgotErrorMessage"></p>
            <form id='login' action='/user/register' method='post' accept-charset='UTF-8'>
                <fieldset >						
                    <input type='hidden' name='submitted' id='submitted' value='1'>
                    <label for='forgot_password_email' ><span class="fa fa-user"></span></label>
                    <input type='email' autocomplete="off" name='forgot_password_email' id='forgot_password_email'  maxlength="50" placeholder="Email" />
                    <input type='submit' class="btn btn-primary" name='forgot_password_submit' id="forgot_password_submit" value='Send Request'>
                </fieldset>
            </form>
            
            <ul class="login_footer_links">
                <li><a href="#" class="signin">Member Already? <span>Sign In</span></a></li>
                <li style="display:none"><a href="#" class="show_register">New Tenant? <span>Sign Up</span></a></li>
            </ul>
        </div>
    </div>
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


            
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <script src="/apt_apply_assets/frameworks/jquery-validation-engine/js/languages/jquery.validationEngine-en.js?v=1.1" type="text/javascript" charset="utf-8" defer></script>
        <script src="/apt_apply_assets/frameworks/jquery-validation-engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8" defer></script>
        <script src="/apt_apply_assets/frameworks/datetimepicker-master/build/jquery.datetimepicker.full.min.js" defer></script>   			
            
                

        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="/apt_apply_assets/frameworks/moment/moment.min.js?t=20221102134320"></script>	
<script src="/apt_apply_assets/apt_apply_2.js?t=20221102134320"></script>	
<script src="/apt_apply_assets/apt_apply_2/js/search.js?t=20221102134320"></script>
<script src="/apt_apply_assets/apt_apply_2/js/post.js?t=20221102134320"></script>
<script src="/apt_apply_assets/apt_apply_2/js/remove.js?t=20221102134320"></script>	


<script src="/apt_apply_assets/apt_apply_2/js/login.js?t=20221102134320"></script>	

</body>



@endsection
