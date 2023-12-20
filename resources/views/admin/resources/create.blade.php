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
    <h1 class="mainTitle">    New Resource
</h1>

    
                            <div class="main-container">
    <div class="container">

        <div class="main-container">
        <div class="container"><div class="row">
<div class="col-md-12">
            
    <section class="widget admin_view_record" id="RecordSection">
            
        <section class="widget-content">	
            
                                    
            <form action="{{route('resource.insert')}}" method="post" enctype="multipart/form-data">							
					@csrf		
                <div class="form_field">							
                    <label style="width:100%">Building: </label>								
                    <select id="building_id" name="building_id" data-placeholder="Select Building" class="chosen-select">
                        <option value="">Select building</option>
                        @foreach($buildings as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach                        
                    </select>
                </div>
                
                                            <div class="form_field">
                    <label style="width:100%">Category: </label>
                    <select name="category_id" id="category" >
                        <option value="">Select category</option>
                        <option value="">test</option>
                                                        </select>
                </div>
                <div class="form_field">
                    <label style="width:100%">Title: </label>
                    <input type="text" id="title" name="title" value="" />
                </div>
                <div class="form_field">
                    <label style="width:100%">Document Description: </label>
                    <textarea id="description" name="description"></textarea>
                </div>
                <div class="form_field">
                    <label style="width:100%">Document: </label>
                    <input type="file" name="document" id="document" />								
                </div>						
                
                <div class="form_field" style="max-width:200px">
                    <label style="width:100%"></label>
                    <input class="button btn" name="save_field" id="save_field" type="submit" value="Update" />
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
   @section('js')

   <script>

    $('#building_id').unbind('change').on('change', function () {
        document.location.href = '/condeto_admin/resources/create/'+$(this).val();
    });
    
    </script>
    
 
   @endsection

@endsection