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
    
    .chosen-container-single .chosen-single
    {
        padding:0 10px !important;
    }
    
    .chosen-container-single .chosen-single > div
    {
        line-height:22px;  
        width:20px !important;
    }
    
    .chosen-container-single .chosen-single > div:before
    {
        font-size:15px !important;
    }
    </style>
@endsection
@section('content')
 
<div class="">
    <h1 class="mainTitle">    Revenue
</h1>

    <div class="clearfix"></div>
    <div class="page-head">
      <h2 class="pull-left"></h2>
      <ul class="page-tabs">
            <li id="export"><a class="export_link" href="{{route('property.revenue.export')}}">Export CSV <i data-active-class="fa-download" data-not-active-class="fa-download" class="fa fa-download"></i></a></li>
            <li id="search_toggle"><a href="{{route('property.revenue')}}" >Refresh <i class="fa fa-refresh"></i></a></li>

      </ul>
    <div class="clearfix"></div>

    </div>
            <div class="main-container">
    <div class="container">

            <div class="main-container">
<div class="container"><div class="row">
<div class="col-md-12">
    <form name='dbForm' id='dbForm' action="{{route('revenue.filter')}}" method="POST">
        @csrf
        <div class="property_selector">
            <select onChange="autoSubmit();" name="property" id="property_id"  data-placeholder="Select Property" class="chosen-select">
                <option value="">Filter By Complex/Building</option>
                @foreach($building as $item)
                @if($item->type_id ==  29)
                <option value="{{$item->id}}">Complex:{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">Building:{{$item->name}}</option>
                @endif
                @endforeach                
            </select>
        </div>
    </form>
    
    
    
    <div class="date_period">
        <div class="date_block" id="date_from">
            <label>From : </label>
            <input type="text" name="from_date" id="from_date" />
        </div>
        <div class="date_block" id="date_to">
            <label>To : </label>
            <input type="text" name="to_date" id="to_date" />
        </div>
    </div>
    
    <table style="width:100%" class="revenue_table">
        <thead>
            <tr>
                <th>Building/Complex</th>
                <th class="numerical">Amount Received</th>
                <th class="numerical">Condeto Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sum = 0;    
            $sum2 = 0;    
            ?>
               @foreach($revenue as $item)                                 
             <tr>
                <td>{{$item->building_name}}</td>
                <td class="numerical">
                    <?php $sum+= $item->amount_paid; ?>
                    {{$item->amount_paid}}
                </td>
                <td class="numerical">
                    <?php $sum2+= $item->condeto_fee; ?>
                    {{$item->condeto_fee}}
                </td>
            </tr>
                @endforeach   
        </tbody>
        <tfoot>
            <tr>
                <td class="numerical"></td>
                <td class="numerical"><?php echo $sum; ?></td>
                <td class="numerical"><?php echo $sum2; ?></td>
            </tr>
        </tfoot>                                                                                
        </tfoot>				
    </table>
    <div class="d-flex justify-content-center">
        {!! $revenue->links() !!}
    </div>
 <div class="clearfix"></div>
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
    function autoSubmit()
    {
        var formObject = document.forms['dbForm'];
        formObject.submit();
    }
</script>


@endsection