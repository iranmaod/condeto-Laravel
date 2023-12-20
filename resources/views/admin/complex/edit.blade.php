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
    <h1 class="mainTitle">    Edit Complex
</h1>

    
                            <div class="main-container">
    <div class="container">

        <div class="main-container">
        <div class="container"><div class="row">
<div class="col-md-12">
            
    <section class="widget admin_view_record" id="RecordSection">
            
        <section class="widget-content">	
            
                                    
            <form action="{{route('admin.complex.update',$complex->id)}}" method="post">
                @csrf	
                <div class="form_field">
                    <label style="width:100%">Complex Name: </label>
                    <input type="text" id="complex_name" name="complex_name" value="{{$complex->name}}" />
                </div>
                
                <div class="form_field">
                    <label style="width:100%">Payment Processing Fee %: </label>
                    <input type="text" id="stripe_fee" name="stripe_fee" value="{{$complex->stripe_charge_percent == 0.00 ? '3.25' : $complex->stripe_charge_percent}}" />%
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