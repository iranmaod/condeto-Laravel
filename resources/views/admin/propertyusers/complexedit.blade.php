@extends('layouts.admin')
@section('css')
<style type="text/css">

    .form_field
    {
        padding:10px;
        border-bottom:1px solid #ccc;
    }
    
    .form_field:hover
    {
        background:#eee;
    }
    
    .form_field label
    {
    
    }
    
    .form_field input
    {
        border:1px solid #ccc;
        max-width:500px;
        background:none;
        width:100%;
    }
    
    .form_field select
    {
        width:100%;
        max-width:500px;
        padding:10px;
        border:1px solid #ccc;
    }
    
    .form_field select option
    {
        padding:5px;
    }
    
    .widget p.admin_message
    {	
        padding:10px 20px;
        max-width:500px;
        width:100%;
        margin-left:10px !important;
        margin-top:10px !important;
        text-align:center;
    }
    
    </style>
    
@endsection
@section('content')
 

<div class="">
    <h1 class="mainTitle">    Edit User
</h1>

    
                            <div class="main-container">
    <div class="container">

        <div class="main-container">
        <div class="container"><div class="row">
<div class="col-md-12">
            
    <section class="widget admin_view_record" id="RecordSection">
            
        <section class="widget-content">	
            
                
            
            <form action="{{route('admin.complex.update',$user->id)}}" method="post">	
                @csrf                    
                <div class="form_field">
                    <label style="width:100%">Complex: </label>
                    <select value="{{$user->property_name}}" id="property" name="property" data-placeholder="Select Complex" class="chosen-select">
                        @foreach ($property as $item)
                        <option value="{{$item->id}}" {{$user->property_id == $item->id  ? 'selected' : ''}}>{{$item->name}}</option> 
                        @endforeach
                            
                    </select>
                </div>
                
                <div class="form_field">
                    <label style="width:100%">Email Address: </label>
                    <input readonly="readonly" type="email" id="email" name="email" value="{{$user->email}}" />																	
                </div>
                
                <div class="form_field">
                    <label style="width:100%">First Name: </label>
                    <input type="text" id="firstname" name="firstname" value="{{$user->first_name}}" />																	
                </div>
                
                <div class="form_field">
                    <label style="width:100%">Last Name: </label>
                    <input type="text" id="lastname" name="lastname" value="{{$user->last_name}}" />																	
                </div>
                
                <div class="form_field">
                    <label style="width:100%">Password : </label>
                    <input type="password" id="password" name="password" />	<br />
                    @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
                    <small>Minimum eight characters, at least one uppercase letter, one lowercase letter and one number</small>																
                </div>
                <div class="form_field">
                    <label style="width:100%">Confirm Password : </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" />	
                    @if($errors->has('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif																
                </div>
                
                <div class="form_field" style="max-width:200px">
                    <label style="width:100%"></label>
                    <input class="button btn" name="save_field" id="save_field" type="submit" value="Save" />
                </div>
            </form>

        </section>

     </section>
				


@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search_advaced").click(function(){
    $("#advanced_search").toggle();
  });
});
</script>


@endsection