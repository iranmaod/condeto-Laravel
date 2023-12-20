<?php
use App\Models\Property;
use App\Models\Listing;
?>

@extends('layouts.admin')
@section('css')
<style>
	.revenue_table
	{
		width:100%;
	}

	.revenue_table thead,
	.revenue_table tfoot
	{
		background:#333;
		color:#fff;
	}

	.revenue_table thead th,
	.revenue_table td
	{
		padding:5px;
	}

	.revenue_table tbody tr:nth-of-type(even)
	{
		background:#fff;
	}

	.revenue_table tbody tr:nth-of-type(odd)
	{
		background:#eee;
	}

	.date_period
	{
		float:right;  
		margin-bottom:10px;
	}

	.date_period .date_block
	{
		display:inline-block;
		margin-left:20px;
	}

	.date_period input
	{
		border:1px solid #000;
	}

	.property_selector
	{
		float:left;
		max-width:300px;
	}

	.property_selector select
	{
		padding:5px;
		width:100%;
	}

	.numerical
	{
		text-align:right;
	}

	.revenue_table .complex_row td
	{
	  background:#777;
	  color:#fff;
	  border-top:1px solid #000;  
	}
	
	.revenue_table .building_row,
	.revenue_table .complex_row
	{
		cursor:pointer;
	}

	.revenue_table .building_row,
	.revenue_table .apartment_row
	{
		display:none;
	}

	.revenue_table .building_row td
	{
	  border-top:1px solid #000;
	  background:#ccc;  
	}

	.revenue_table .apartment_row td
	{
	  border-top:1px solid #000;
	  background:#eee;  
	}
	
	.property_selector
	{
	margin-bottom:10px;
	}
	</style>
@endsection
@section('content')
 

 
<div class="">
    <h1 class="mainTitle">    Property Overview
</h1>

    <div class="clearfix"></div>
    <div class="page-head">
      <h2 class="pull-left"></h2>
      <ul class="page-tabs">
<li id="export"><a class="export_link" href="{{route('property.overview.export')}}" target="_blank">Export CSV <i data-active-class="fa-download" data-not-active-class="fa-download" class="fa fa-download"></i></a></li>

      </ul>
    <div class="clearfix"></div>

    </div>
            <div class="main-container">
    <div class="container">

            <div class="main-container">
<div class="container">
<div class="row">
    <div class="col-md-12">
    
        <div class="property_selector">
            <select name="property_id" id="property_id"  data-placeholder="Select Complex" class="chosen-select">
                <option >Filter By Complex</option>
                @foreach($property as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                                   
              </select>
        </div>
    
        <table style="width:100%" class="revenue_table">
            <thead>
                <tr>
                    <th width="35%">Complex</th>
                    <th width="35%">Building</th>
                    <th width="30%">Apartment</th>								
                </tr>
            </thead>
            @foreach ($property as $item)
            <tr class="complex_row">
                <td >
                  
                    <?php
                        $complex_count = Property::where('parent_property_id',$item->id)->get();    
                    ?>
                    
                    {{$item->name}}({{count($complex_count)}})
                   
                  </td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
            @foreach($complex_count as $b_item)
            <tr style="display: block" class="building_row">
                <td></td>
                <?php
                $b_count = Property::where('parent_property_id',$b_item->id)->get();    
            ?>
                
                  <td>
                    {{$b_item->name}}({{count($b_count)}})
                  </td>
                
                
               
                <td>&nbsp;</td>
            </tr>
            @endforeach
            @foreach($complex_count as $a_item)
            <tr style="display: block" class="apartment_row">
                <td></td>
                <?php
                $a_count = Listing::where('address',$a_item->name)->get();    
            ?>
                
                  <td>
                    {{$a_item->name}}
                  </td>
                
                
               
                <td></td>
            </tr>
            @endforeach
            @endforeach
                                                                  
        </table>
        <div class="clearfix"></div>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>




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
<script>
$(document).ready(function(){
  $("#complex_id").click(function(){
    $("#building_id").toggle();
  });
});
</script>


@endsection