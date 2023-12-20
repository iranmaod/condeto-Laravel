<?php
use App\Models\Property;

$property = Property::find($building_id);
// echo '<pre>';
//   print_r($property);exit;  	
//   print_r($item->id);  	
?>

@extends('layouts.admin')
@section('content')
 

 <div class="">
                <h1 class="mainTitle"> Apartments</h1>

                <div class="clearfix"></div>
				<div class="page-head">
				  <h2 class="pull-left"></h2>
				  <ul class="page-tabs"><li id="search_toggle"><a href="#" onclick="toggle_search('#advanced_search',$(this));">Advanced Search <i data-active-class="fa-search-minus" data-not-active-class="fa-search-plus" class="fa fa-search-plus"></i></a></li>
	<li id="search_toggle"><a href="#" onclick="apply_filters(); return false;">Refresh <i class="fa fa-refresh"></i></a></li>
	<li id="export"><a class="export_link" href="{{route('building_apartments.export',$property->id)}}" target="_blank">Export CSV <i data-active-class="fa-download" data-not-active-class="fa-download" class="fa fa-download"></i></a></li>

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
							<a href="#" onclick="toggle_search('#advanced_search',$(this));" class="wminimize"><i class="fa fa-chevron-up icon-chevron-up"></i></a>
							Advanced Search
						</div>
						<div class="clearfix"></div>
					</header>
					<section class="widget-content">
						<div class="filter_section_row" data-label="Search">
							<div class="row search_area_row" data-uid="search_area_row">
								<div class="col-md-12">
									<div class="form-group">
									  <label class="col-lg-1 control-label">Search</label>
									  <div class="col-lg-1">
										<select class="form-control andor">
											<option value="AND">AND</option>
											<option value="OR">OR</option>
										</select>
									  </div>
									  <div class="col-lg-2">
										<select class="form-control search_area_field">
											<option value="">-- Select --</option>
											<optgroup class="optgroup_filters" label="Filters">
												<option data-type="Complex" value="building_complex">Complex</option>
											</optgroup>
											<optgroup class="optgroup_fields" label="Fields">
											</optgroup>
										</select>
									  </div>
									</div>

									<div class="search_area_container_equation form-group">
									  <div class="col-lg-2">
										<select class="form-control search_area_equation">
										</select>
									  </div>
									</div>

									<div class="search_area_container form-group">
									  <div class="col-lg-2">
										<span class="search_area_text_container">
											<input type="text" class="search_area_text form-control" placeholder="">
										</span>
									  </div>
									</div>
									
									<div class="search_area_container_select form-group">
									  <div class="col-lg-2">
										<select class="form-control search_area_filter chosen-select" data-placeholder="Select">
										</select>
									  </div>
									</div>									

									<div class="form-group">
										<div class="col-lg-1">
											<button type="button" alt="Remove Search" title="Remove Search" class="btn btn-danger subtraction_button"><i class="fa fa-minus-square-o"></i></button>
											
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
										<select class="form-control sort_area_field">
										</select>
									  </div>
									</div>

									<div class="form-group">
									  <div class="col-lg-2">
										<select class="form-control sort_area_order">											
											<option  value="ASC">ASC</option>
											<option value="DESC">DESC</option>
										</select>
									  </div>
									</div>

									<div class="form-group">
									  <div class="col-lg-1">
										<button type="button" alt="Remove Sort" title="Remove Sort" class="btn btn-danger subtraction_button"><i class="fa fa-minus-square-o"></i></button>
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
										<button type="button" alt="Apply" title="Apply" class="btn btn-success" id="search_apply">Apply <i class="fa fa-check-square-o"></i></button>&nbsp;&nbsp;
										<button type="button" alt="Reset" title="Reset" class="btn btn-danger" id="search_reset">Reset <i class="fa fa-undo"></i></button>
									  </div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</section>
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
								@foreach ($building as $item)
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
							{{-- {!! $building->links() !!} --}}
						</div>
					</section>

				 </section>
				


@endsection