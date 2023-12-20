<?php
use App\Models\AptUsers;
use App\Models\User;


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Condeto Admin</title>
        <meta name="description" content="">

		<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/62bd119cd8.js" crossorigin="anonymous"></script>

        <link rel="icon" href="/public/admin/img/favicon-16x16.ico.png" type="image/x-icon">
        <link rel="shortcut icon" href="/public/admin/img/favicon-16x16.ico.png" type="image/x-icon">
        <link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/bootstrap-switch.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/jquery-ui-1.10.4.custom.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/validationEngine.jquery.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/dropzone.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/form.css?t=now()')}}" rel="stylesheet">
        <link href="{{asset('admin/css/admin.css?t=now()')}}" rel="stylesheet">
 
        <link href="{{asset('admin/css/stat_blocks.css?t=now()')}}" rel="stylesheet">
        <link href="{{asset('admin/css/dash_new.css?t=now()')}}" rel="stylesheet">
        <link href="{{asset('admin/css/reporting.css?t=now()')}}" rel="stylesheet">	

        @yield('css')        		
			        	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css" />
	<link href="{{asset('admin/css/admin2.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('admin/css/chosen.css')}}" rel="stylesheet" type="text/css" />

                
        <script type="text/javascript">
            var reloadListing = function (callbackURL) {
                alert('Reload Page below as close button clicked.');
            }
            var x2_admin_url = '/';
			var admin_url = '/condeto_admin';
        </script>

        
            </head>
    <body>
		
        <input type="hidden" name="csrf" id="csrf" value="cfc07983efa7359026e5df75d8a3e156a34da93f55c192d8168056113d3017398509043677876fc26c6fa3d18ada9cc19e0f2db6b795b5cd41c9f45d955a6db9">

        <header>
            <div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

                <div class="container">

                    <div class="navbar-header">
                        <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse"><span>Menu</span></button>
                        <span class="navbar_home"><a href="/condeto_admin" class="navbar-branding"><i class="fa fa-home"></i><span class="bold">admin</span></a> <a href="/dashboard" class="navbar-branding site_link"><i class="fa fa-globe"></i>Condeto</a></span>
                    </div>

                    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

                        <ul class="nav navbar-nav pull-right">
                            <li><a href="#" class="pull-right"><i class="fa fa-clock-o"></i><span id="clock" utc_offset="-25200"></span></a></li>
							<?php
							$admin = AptUsers::where('user_id',Auth::id())->first();
							?>
							@if($admin->is_super_admin == 1)

								<li>Super Admin</li>
							@else	
								<li>Complex Manager</li>
							@endif	

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" class="pull-right"><i class="fa fa-sign-out"></i>
									Log Out
								</a>

							</li>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>

                        </ul>
                    </nav>

                </div>
            </div>
        </header>

        <div class="content">
            
			            <div class="left_navigation">
                <div class="left_navigation-dropdown"><a href="#">Navigation</a></div>				
                <ul id="nav">
					<li>
                        <a href="/condeto_admin/" class="open">
                            <span class="overlay-label darkgrey"></span><i class="fa fa-dashboard side_icon"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="collapseMenuOption">
                        <a href="#" class="menubutton hidden-xs">
                            <span class="overlay-label darkgrey"></span><i class="fa fa-bars side_icon"></i> <span class="colTxt">Collapse</span>
                        </a>
                    </li>
                </ul>



				


                <ul id="nav">
					@if($admin->is_super_admin == 1)

					<li class=" has_sub">
						<a href="#" title="administrators" class="subdrop">
							<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Admin Users</span>
						</a>

						<ul style="display: none;">
							<li class="">
								<a href="/condeto_admin/users" title="New administrator">
									<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>View All</span>
								</a>
							</li>
							<li>
								<a href="/condeto_admin/users/create" title="Create User">
									<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>Create User</span>
								</a>
							</li>
						</ul>
					</li>

					<li class=" has_sub">
						<a href="/condeto_admin/revenue" title="administrators">
							<span class="overlay-label darkgrey"></span><i class="fa fa-credit-card"></i><span>Revenue</span>
						</a>
					</li>
					@endif
					
										
					<li class=" has_sub">
						<a href="#" title="Buildings">
							<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Property</span>
						</a>

						<ul>

							@if($admin->is_super_admin == 1)
							<li class="">
								<a href="/condeto_admin/complexs" title="Complexes">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Complexes</span>
								</a>
								<ul>
									<li class="">
										<a href="/condeto_admin/complexs/create" title="New Complex">
											<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>New Complex</span>
										</a>
									</li>									
								</ul>
							</li>

							@endif
							
														
							<li class="">
								<a href="{{route('buildings.index')}}" title="Buildings/Complexs">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Buildings</span>
								</a>
																<ul>
																	
								
								<li class="">
										<a href="{{route('buildings.create')}}" title="New Building">
											<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>New Building</span>
										</a>
									</li>									
								</ul>
															</li>
							
							<li class="">
								<a href="/condeto_admin/apartments" title="Apartments">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Apartments</span>
								</a>
								<ul>
									<li class="">
										<a href="/condeto_admin/apartments/create" title="New Apartment">
											<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>New Apartment</span>
										</a>
									</li>									
								</ul>
							</li>


							@if($admin->is_super_admin == 1)
							<li class="">
								<a href="/condeto_admin/property_overview" title="Complexes">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Overview</span>
								</a>
								
							</li>

							@endif
							
														
							<li class="">
								<a href="/condeto_admin/properties/import/xml" title="Property Import">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Import Via XML</span>
								</a>								
							</li>
							
							<li class="">
								<a href="/condeto_admin/properties/import" title="Property Import CSV">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Import Via CSV</span>
								</a>
							</li>

						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Property Users">
							<span class="overlay-label darkgrey"></span><i class="fa fa-connectdevelop"></i><span>Property Users</span>
						</a>

						<ul>


							@if($admin->is_super_admin == 1)
							<li class="">
								<a href="/condeto_admin/associations/complex_managers" title="Complexes">
									<span class="overlay-label darkgrey"></span><i class="fa fa-building"></i><span>Complexe Managers</span>
								</a>
								<ul>
									<li class="">
										<a href="/condeto_admin/associations/complex_managers/new" title="New Complex">
											<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>Create New Complex Manager</span>
										</a>
									</li>									
								</ul>
							</li>

							@endif


														<li class="">
								<a href="/condeto_admin/associations/tenants" title="Tenants">
									<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Tenants</span>
								</a>
								<!--<ul>
									<li class="">
										<a href="/condeto_admin/associations/tenants/import/xml" title="Import Tenants XML">
											<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Import Tenants XML</span>
										</a>
									</li>
									<li class="">
										<a href="/condeto_admin/associations/tenants/import" title="Import Tenants CSV">
											<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Import Tenants CSV</span>
										</a>
									</li>
								</ul>-->
							</li>
							<li class="">
								<a href="/condeto_admin/associations/staff" title="Staff">
									<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Staff</span>
								</a>
							</li>
							<li class="">
								<a href="/condeto_admin/associations/property_users/import" title="Import Users">
									<span class="overlay-label darkgrey"></span><i class="fa fa-user"></i><span>Import Users</span>
								</a>
							</li>
							
						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Resources">
							<span class="overlay-label darkgrey"></span><i class="fa fa-briefcase"></i><span>Resources</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/resources" title="View all">
									<span class="overlay-label darkgrey"></span><i class="fa fa-briefcase"></i><span>View All</span>
								</a>
								<ul>
									<li>
										<a href="/condeto_admin/resources/create" title="Categories">
											<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Create Resource</span>									
										</a>
									</li>									
								</ul>
							</li>
							<li class="">
								<a href="/condeto_admin/resources/categories" title="View all">
									<span class="overlay-label darkgrey"></span><i class="fa fa-briefcase"></i><span>Catagories</span>
								</a>
								<ul>
									<li>
										<a href="/condeto_admin/resources/categories/create" title="Categories">
											<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Create Category</span>									
										</a>
									</li>									
								</ul>
							</li>								
						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Community">
							<span class="overlay-label darkgrey"></span><i class="fa fa-users"></i><span>Community</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/community/categories" title="Categories">
									<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Categories</span>									
								</a>
								<ul>
									<li>
										<a href="/condeto_admin/community/categories/create" title="Categories">
											<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Create Category</span>									
										</a>
									</li>									
								</ul>
							</li>
							<li class="">
								<a href="/condeto_admin/community/messages" title="Categories">
									<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Messages</span>
								</a>
							</li>							
						</ul>
					</li>

					<li class=" has_sub">
						<a href="#" title="Events">
							<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Events</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/events/deliveries" title="Deliveries">
									<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Deliveries</span>
								</a>
							</li>
							<li class="">
								<a href="/condeto_admin/events/repairs" title="Repairs">
									<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Repairs</span>
								</a>
							</li>
							<li class="">
								<a href="/condeto_admin/events/pickups" title="Pickups">
									<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Pickups</span>
								</a>
							</li>
							<li class="">
								<a href="/condeto_admin/events/visitors" title="Visitors">
									<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Visitors</span>
								</a>
							</li>
							<li class="">
								<a href="/condeto_admin/events/facility_bookings" title="Facility Bookings">
									<span class="overlay-label darkgrey"></span><i class="fa fa-calendar"></i><span>Facility Bookings</span>
								</a>
							</li>
							<!--<li class="">
								<a href="/condeto_admin/event/messages" title="Categories">
									<span class="overlay-label darkgrey"></span><i class="fa fa-list-alt"></i><span>Messages</span>
								</a>
							</li>-->
						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Payments">
							<span class="overlay-label darkgrey"></span><i class="fa fa-credit-card"></i><span>Payments</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/payments" title="Payments">
									<span class="overlay-label darkgrey"></span><i class="fa fa-credit-card"></i><span>View Payments</span>
								</a>
							</li>							
						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Messages">
							<span class="overlay-label darkgrey"></span><i class="fa fa-comments"></i><span>Messages</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/messages" title="View All">
									<span class="overlay-label darkgrey"></span><i class="fa fa-comments"></i><span>View all</span>
								</a>
							</li>							
						</ul>
					</li>
					
					<li class=" has_sub">
						<a href="#" title="Messages">
							<span class="overlay-label darkgrey"></span><i class="fa fa-th"></i><span>Facilities</span>
						</a>

						<ul>
							<li class="">
								<a href="/condeto_admin/facilities" title="View All">
									<span class="overlay-label darkgrey"></span><i class="fa fa-th"></i><span>View all</span>
								</a>
							</li>
							<li>
								<a href="/condeto_admin/facilities/create" title="Create New Facility">
									<span class="overlay-label darkgrey"></span><i class="fa fa-plus"></i><span>Create New Facility</span>
								</a>
							</li>							
						</ul>
					</li>
					
					<!--
					
                    					

                    					
					-->

					

                    <li class=" ">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" ><span class="overlay-label darkgrey"></span><i class="fa fa-sign-out"></i><span>Logout</span></a>
                    </li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
                </ul>
				
            </div>

            <div class="mainbar">
                <h1 class="mainTitle"></h1>

                
            <div class="main-container">
            <div class="container">

                    	
                <div id="app">
    
                    <main class="">
                        @yield('content')
                    </main>
                </div>

			<div style="clear:both;"></div>
		</div>



	</div>


        </div>
    </div>
</div>

<div class="clearfix"></div>

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</footer>


<div class="modals">
</div>


<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

@yield('js')
<script src="{{asset('admin/js/jquery-1.10.2.min.js')}}" ></script>
<script src="{{asset('admin/js/jquery-ui-1.10.4.custom.min.js')}}" defer></script>
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}" defer></script>
<script src="{{asset('admin/js/moment-with-locales.js')}}" defer></script>
<script src="{{asset('admin/js/transition.js')}}" defer></script>
<script src="{{asset('admin/js/collapse.js')}}" defer></script>
<script src="{{asset('admin/js/bootstrap.js')}}" defer></script>
<script src="{{asset('admin/js/bootstrap-switch.min.js')}}" defer></script>
<script src="{{asset('admin/js/bootstrap-datetimepicker.js')}}" defer></script>
<script src="{{asset('admin/js/modernizr-2.6.2.min.js')}}" defer></script>
<script src="{{asset('admin/js/jstorage.js')}}" defer></script>
<script src="{{asset('admin/js/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8" defer></script>
<script src="{{asset('admin/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8" defer></script>
<script src="{{asset('admin/js/jquery.form.min.js')}}" defer></script>
<script src="{{asset('admin/js/jquery-cookie.js')}}" defer></script>
<script src="{{asset('admin/js/x2web.js?t=now()')}}" defer></script>
<script src="{{asset('admin/js/modal.js')}}" defer></script>
<script src="{{asset('admin/js/admin.js?t=now()')}}" defer></script>
<script src="{{asset('admin/js/groups.js')}}" defer></script>
<script src="{{asset('admin/js/jquery.maskedinput.min.js')}}" defer></script>
<script src="{{asset('admin/js/jquery.animateNumbers.js')}}" defer></script>



<script src="{{asset('admin/js/reporting.js')}}" defer></script>

<script src="{{asset('admin/js/stat_blocks.js')}}" defer></script>
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<script src="{{asset('admin/js/listings.js')}}" defer></script>
	<script src="{{asset('admin/js/chosen.jquery.min.js')}}" defer></script>

<div id="modal_dummy" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Close"><i class="fa fa-close"></i><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modal_title">Popup</h4>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
