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
    
    .import_results
    {
      margin-bottom:10px;
      background:#fff;
      border:1px solid #000;
      border-top:0;
    }
    
    .import_results p
    {  
      border-top:1px solid #000;
      text-indent:20px;
      position:relative;
      line-height:1em;
      padding:5px 0;
    }
    
    .import_results p:before
    {
      content:'';
      border-radius:20px;
      width:10px;
      left:5px;
      top:7px;
      height:10px;
      position:absolute;
      background:green;
    }
    
    .import_results p.failed:before
    {
      background:red;
    }
    
    </style>
    
@endsection
@section('content')

<div class="">
    <h1 class="mainTitle">    Import Properties (XML)
</h1>

    
                            <div class="main-container">
    <div class="container">

            <div class="main-container">
<div class="container">
<div class="row">
    <div class="col-md-12">
                                                    
        <section class="widget admin_view_record" id="RecordSection">

            <section class="widget-content">	
                            
                <div style="padding:10px;">
                    <p>Please download the sample XML file to see the structure of the data.</p>
                    <p>Once you have the XML file please upload using the form below and click import.</p>
                    <p><a href="{{asset('apt_apply_assets/sample.xml')}}">Download XML File</a></p>
                </div>

                <form action="{{route('property.xml')}}" method="post" enctype="multipart/form-data">	
                    @csrf
                    <div class="form_field">
                        <label style="width:100%">Select XML File</label>
                        <input type="file" accept=".xml" name="property_file" id="property_file" />
                    </div>

                    <div class="form_field" style="max-width:200px">
                        <label style="width:100%"></label>
                        <input class="button btn" name="save_field" id="save_field" type="submit" value="Import" />
                    </div>
                </form>

            </section>

        </section>
        <div class="clearfix"></div>
    </div>
</div>

</div>
</div>

</div>
</div>
</div>


@endsection