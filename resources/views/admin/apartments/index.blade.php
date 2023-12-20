<?php
use App\Models\Property;
?>

@extends('layouts.admin')
@section('content')
 

 <div class="">
                <h1 class="mainTitle"> Apartments</h1>
				<div class="clearfix"></div>
				<div class="page-head">
				  <h2 class="pull-left"></h2>
				  <ul class="page-tabs" ><li id="search_toggle"><a id="search_advaced" href="#" >Advanced Search <i data-active-class="fa-search-minus" data-not-active-class="fa-search-plus" class="fa fa-search-plus"></i></a></li>
	<li id="search_toggle"><a href="{{route('apartments.index')}}" >Refresh <i class="fa fa-refresh"></i></a></li>
	<li id="export"><a class="export_link" href="{{route('apartments.export')}}" target="_blank">Export CSV <i data-active-class="fa-download" data-not-active-class="fa-download" class="fa fa-download"></i></a></li>

				  </ul>
				<div class="clearfix"></div>

				</div>
                        <div class="main-container">
                <div class="container">

                    <div class="main-container">
					<div class="container"><div class="row">
			<div class="col-md-12">
								<section id="simple_search" class="widget list-style-layout">
					<header class="widget-head">
						<div class="widget-icons pull-left">
							<a href="#" class="wminimize"><i class="fa fa-chevron-up icon-chevron-up"></i></a>
							Simple Search
						</div>
						<div class="clearfix"></div>
					</header>	
					<section class="widget-content">
						<div class="filter_section_row" data-label="Search">					
							<input type="text" class="search_area_text form-control" placeholder="Enter Search Text" id="simple_search_text">
						</div>
					</section>
				</section>
				
					<section style="" id="advanced_search" class="widget list-style-layout">
					<header class="widget-head">
						<div class="widget-icons pull-left">
							<a href="#" class="wminimize"><i class="fa fa-chevron-up icon-chevron-up"></i></a>
							Advanced Search
						</div>
						<div class="clearfix"></div>
					</header>
					<form  method="POST" action="{{route('building.search')}}">
						@csrf
						<section class="widget-content">
							<div class="filter_section_row" data-label="Search">
								<div class="row search_area_row" data-uid="search_area_row">
									<div class="col-md-12">
										<div class="form-group">
											
										  <label class="col-lg-1 control-label">Search</label>
										 
										  <div class="col-lg-2">
											<select class="form-control search_area_field" name="name">
												<option value="">-- Select --</option>
												<optgroup class="optgroup_filters" label="Filters">
													<option data-type="Complex" value="building_complex">Building</option>
												</optgroup>
												<optgroup class="optgroup_fields" label="Fields">
													<option data-type="Complex" value="building_complex">Property Name</option>
													<option data-type="Complex" value="building_name">Building Name</option>
												</optgroup>
											</select>
										  </div>
										</div>
	
										<div class="search_area_container_equation form-group">
										  <div class="col-lg-2">
											<select class="form-control search_area_equation" name="type">
												<option value="EQ" data-type="string">Equals</option>
												<option value="NEQ"  data-type="string">Not Equals</option>
											</select>
										  </div>
										</div>
	
									
								
										<div class="search_area_container form-group">
											<div class="col-lg-2">
											  <span class="search_area_text_container">
												  <input type="text" name="search_text" class="search_area_text form-control" placeholder="">
											  </span>
											</div>
										  </div>								
	
										<div class="form-group">
											<div class="col-lg-1">
												{{-- <button type="button" alt="Remove Search" title="Remove Search" class="btn btn-danger subtraction_button"><i class="fa fa-minus-square-o"></i></button> --}}
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="filter_section_row" id="sort_area" data-label="Sort" data-max-records="{count($fields)}">
								<div class="row sort_area_row" data-uid="sort_area_row">
									<div class="col-md-12">
										<div class="form-group">
										  <label class="col-lg-1 control-label">Sort</label>
										  <div class="col-lg-2">
											<select class="form-control sort_area_field" name="sortby">
													<option data-type="Complex" value="id">ID</option>
													<option data-type="Complex" value="city">City</option>
													<option data-type="Complex" value="state">State</option>
													<option data-type="Complex" value="zip">Zip</option>
													<option data-type="Complex" value="name">Property Name</option>
											</select>
										  </div>
										</div>
	
										<div class="form-group">
										  <div class="col-lg-2">
											<select class="form-control sort_area_order" name="sort">											
												<option value="ASC">ASC</option>
												<option value="DESC">DESC</option>
											</select>
										  </div>
										</div>
	
										<div class="form-group">
										  <div class="col-lg-1">
											{{-- <button type="button" alt="Remove Sort" title="Remove Sort" class="btn btn-danger subtraction_button"><i class="fa fa-minus-square-o"></i></button> --}}
											{{-- <button type="button" alt="Add Sort" title="Add Sort" class="btn btn-success additional_button additional_button_sort"><i class="fa fa-plus-square-o"></i></button> --}}
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div class="filter_section_row" >
								<div class="row button_row" data-uid="button_row">
									<div class="col-md-12">
										 <label class="col-lg-1 control-label">&nbsp;</label>
										<div class="form-group">
										  <div class="col-lg-6">
											<button type="submit" alt="Apply" title="Apply" class="btn btn-success" id="search_apply">Apply <i class="fa fa-check-square-o"></i></button>&nbsp;&nbsp;
											<button type="button" alt="Reset" title="Reset" class="btn btn-danger" id="search_reset">Reset <i class="fa fa-undo"></i></button>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</section>
					</form>
					
				</section>
				<section class="widget list-style-layout" id="ListingSection">
										
					<section class="widget-content">
						<table class="table table-striped table-bordered table-hover datatable">
							<thead>
								<tr>
									<th id="th_id"  width="50" style="width:50">Id</th>									
									<th id="th_ap">Property Name</th>
																		
									<th id="th_ap">Building</th>
									<th id="th_mg">Building</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($apartment as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td>{{$item->name}}</td>
									
									<td>
										<?php
										$building = Property::where('id',$item->parent_property_id)->first();
										// echo '<pre>';
                                        //   print_r($building);  	
                                        //   print_r($item->id);  	
										?>

										@if($building)
										
										{{$building->name}}
										@else
										None
										@endif
										
									</td>
									<td>
										<a style="margin-right:7px" class="btn btn-xs btn-success" href="{{route('apartments.edit',$item->id)}}">
										<i class="fa fa-pencil"></i></a>
										<a style="margin-right:7px" class="btn btn-xs btn-warning" href="{{route('apartments.delete',$item->id)}}">
										<i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
								@endforeach
													
							</tbody>
						</table>
						<div class="faux_table_footer">
							{!! $apartment->links() !!}
						</div>
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