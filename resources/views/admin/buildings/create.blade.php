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
<header>


    <div class="">
        <h1 class="mainTitle">    Create Building
</h1>

        
        <div class="main-container">
        <div class="container">

            <div class="main-container">
            <div class="container"><div class="row">
    <div class="col-md-12">
                
        <section class="widget admin_view_record" id="RecordSection">
                
            <section class="widget-content">	
                
                                        
                <form action="{{route('buildings.add')}}" method="post">
                    @csrf	
                    <div class="form_field">
                        <label style="width:100%">Complex: </label>
                        <select id="complex_id" name="complex_id" data-placeholder="Select Complex" class="chosen-select">
                            <option value="40">Bedford Stuyvesant_5065</option>
                        </select>
                    </div>
                    
                    <div class="form_field">
                        <label style="width:100%">Building Name: </label>
                        <input type="text" id="building_name" name="building_name" value="" />
                    </div>
                    
                    <div class="form_field">
                        <label style="width:100%">City: </label>
                        <input type="text" id="city" name="city" value="" />
                    </div>
                    
                    <div class="form_field">
                        <label style="width:100%">State: </label>
                        <input type="text" id="state" name="state" value="" />
                    </div>
                    
                    <div class="form_field">
                        <label style="width:100%">Zip: </label>
                        <input type="text" id="zip" name="zip" value="" />
                    </div>
                    
                    <div class="form_field" style="max-width:200px">
                        <label style="width:100%"></label>
                        <input class="button btn" name="save_field" id="save_field" type="submit" value="Save" />
                    </div>
                </form>

            </section>

         </section>
   













@endsection