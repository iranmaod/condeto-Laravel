<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');


Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/condeto_admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');



    Route::get('/condeto_admin/users', [App\Http\Controllers\AdminController::class, 'adminUser'])->name('admin.users');
    Route::get('/condeto_admin/users/create', [App\Http\Controllers\AdminController::class, 'adminUserCreate'])->name('admin.users.create');
    Route::post('/condeto_admin/users/create', [App\Http\Controllers\AdminController::class, 'adminUserCreateNew'])->name('admin.users.new');
    Route::get('/condeto_admin/users/edit/{id}', [App\Http\Controllers\AdminController::class, 'adminUserEdit'])->name('admin.users.edit');
    Route::post('/condeto_admin/users/edit/{id}', [App\Http\Controllers\AdminController::class, 'adminUserUpdate'])->name('admin.users.update');
    Route::get('/condeto_admin/users/delete/{id}', [App\Http\Controllers\AdminController::class, 'adminUserDelete'])->name('admin.users.delete');
    Route::get('/condeto_admin/users/export/', [App\Http\Controllers\AdminController::class, 'adminUserExport'])->name('admin.user.export');
    Route::post('/condeto_admin/users/search/', [App\Http\Controllers\AdminController::class, 'adminUserSearch'])->name('admin.user.search');

    Route::get('/condeto_admin/buildings', [App\Http\Controllers\BuildingAdminController::class, 'index'])->name('buildings.index');
    Route::post('/condeto_admin/buildings/search', [App\Http\Controllers\BuildingAdminController::class, 'search'])->name('building.search');
    Route::get('/condeto_admin/buildings/create', [App\Http\Controllers\BuildingAdminController::class, 'create'])->name('buildings.create');
    Route::post('/condeto_admin/buildings/add', [App\Http\Controllers\BuildingAdminController::class, 'add'])->name('buildings.add');
    Route::get('/condeto_admin/buildings/edit/{id}', [App\Http\Controllers\BuildingAdminController::class, 'edit'])->name('buildings.edit');
    Route::post('/condeto_admin/buildings/update/{id}', [App\Http\Controllers\BuildingAdminController::class, 'update'])->name('buildings.update');
    Route::get('/condeto_admin/buildings/delete/{id}', [App\Http\Controllers\BuildingAdminController::class, 'delete'])->name('buildings.delete');
    Route::get('/condeto_admin/properties/import', [App\Http\Controllers\BuildingAdminController::class, 'property_csv'])->name('property.csvpage');
    Route::post('/condeto_admin/properties/import', [App\Http\Controllers\BuildingAdminController::class, 'import_property_csv'])->name('property.csv');
    Route::get('/condeto_admin/properties/import/xml', [App\Http\Controllers\BuildingAdminController::class, 'xml'])->name('property.xmlimport');
    Route::post('/condeto_admin/properties/import/xml', [App\Http\Controllers\BuildingAdminController::class, 'propertyXml'])->name('property.xml');
    Route::get('/condeto_admin/building/export', [App\Http\Controllers\BuildingAdminController::class, 'building_export'])->name('building.export');
    Route::get('/condeto_admin/building/search/{id}', [App\Http\Controllers\BuildingAdminController::class, 'building_search'])->name('buildings.search');




    Route::get('/condeto_admin/complexs', [App\Http\Controllers\BuildingAdminController::class, 'adminComplex'])->name('admin.complex');
    Route::get('/condeto_admin/complexs/create', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexNew'])->name('admin.complex.new');
    Route::post('/condeto_admin/complexs/create', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexCreate'])->name('admin.complex.create');
    Route::get('/condeto_admin/complexs/edit/{id}', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexEdit'])->name('admin.complex.edit');
    Route::post('/condeto_admin/complexs/edit/{id}', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexUpdate'])->name('admin.complex.update');
    Route::get('/condeto_admin/complexs/delete/{id}', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexDelete'])->name('admin.complex.delete');
    Route::get('/condeto_admin/complexs/export/', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexExport'])->name('admin.complex.export');
    Route::post('/condeto_admin/complexs/search/', [App\Http\Controllers\BuildingAdminController::class, 'adminComplexSearch'])->name('admin.complex.search');





    Route::get('/condeto_admin/apartments', [App\Http\Controllers\ApartmentsAdminController::class, 'index'])->name('apartments.index');
    Route::get('/condeto_admin/apartments/create', [App\Http\Controllers\ApartmentsAdminController::class, 'create'])->name('apartments.create');
    Route::post('/condeto_admin/apartments/add', [App\Http\Controllers\ApartmentsAdminController::class, 'add'])->name('apartments.add');
    Route::get('/condeto_admin/apartments/edit/{id}', [App\Http\Controllers\ApartmentsAdminController::class, 'edit'])->name('apartments.edit');
    Route::post('/condeto_admin/apartments/update/{id}', [App\Http\Controllers\ApartmentsAdminController::class, 'update'])->name('apartments.update');
    Route::get('/condeto_admin/apartments/delete/{id}', [App\Http\Controllers\ApartmentsAdminController::class, 'delete'])->name('apartments.delete');
    Route::get('/condeto_admin/apartments/export', [App\Http\Controllers\ApartmentsAdminController::class, 'apartment_export'])->name('apartments.export');
    Route::get('/condeto_admin/apartments/building_apartments/{id}', [App\Http\Controllers\ApartmentsAdminController::class, 'building_apartment_export'])->name('building_apartments.export');
 

    Route::get('/condeto_admin/associations/tenants', [App\Http\Controllers\PropertyUsersController::class, 'tenents'])->name('tenents.index');
    Route::post('/condeto_admin/associations/tenants/search', [App\Http\Controllers\PropertyUsersController::class, 'tenants_search'])->name('tenants.search');
    Route::get('/condeto_admin/associations/staff', [App\Http\Controllers\PropertyUsersController::class, 'staff'])->name('staff.index');
    Route::post('/condeto_admin/associations/staff/search', [App\Http\Controllers\PropertyUsersController::class, 'staff_search'])->name('staff.search');
    Route::get('/condeto_admin/associations/staff/remove/{id}', [App\Http\Controllers\PropertyUsersController::class, 'removestaff'])->name('staff.remove');
    Route::get('/condeto_admin/associations/property_users/import', [App\Http\Controllers\PropertyUsersController::class, 'import'])->name('staff.import');
    Route::post('/condeto_admin/associations/property_users/import', [App\Http\Controllers\PropertyUsersController::class, 'usersImport'])->name('users.import');
    Route::get('/condeto_admin/associations/tenants/export', [App\Http\Controllers\PropertyUsersController::class, 'tenants_export'])->name('tenants.export');
    Route::get('/condeto_admin/associations/staff/export', [App\Http\Controllers\PropertyUsersController::class, 'staff_export'])->name('staff.export');



    Route::get('/condeto_admin/associations/complex_managers', [App\Http\Controllers\PropertyUsersController::class, 'adminManager'])->name('admin.complex.manager');
    Route::get('/condeto_admin/associations/complex_managers/new', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerNew'])->name('admin.complex.new');
    Route::post('/condeto_admin/associations/complex_managers/create', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerCreate'])->name('admin.complex.create');
    Route::get('/condeto_admin/associations/complex_managers/edit/{id}', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerEdit'])->name('admin.complex.edit');
    Route::post('/condeto_admin/associations/complex_managers/edit/{id}', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerUpdate'])->name('admin.complex.update');
    Route::get('/condeto_admin/associations/complex_managers/delete/{id}', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerDelete'])->name('admin.manager.delete');
    Route::get('/condeto_admin/associations/complex_managers/export', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerExport'])->name('admin.complex.export');
    Route::post('/condeto_admin/associations/complex_managers/search', [App\Http\Controllers\PropertyUsersController::class, 'adminManagerSearch'])->name('admin.complex.manager.search');


    Route::get('/condeto_admin/resources', [App\Http\Controllers\ResourcesController::class, 'index'])->name('resource.index');
    Route::get('/condeto_admin/resources/create', [App\Http\Controllers\ResourcesController::class, 'create_resource'])->name('resource.create');
    Route::post('/condeto_admin/resources/create', [App\Http\Controllers\ResourcesController::class, 'insert_resource'])->name('resource.insert');
    Route::post('/condeto_admin/resources/search', [App\Http\Controllers\ResourcesController::class, 'search'])->name('resource.search');
    Route::get('/condeto_admin/resources/export', [App\Http\Controllers\ResourcesController::class, 'export_resource'])->name('resource.export');

    Route::get('/condeto_admin/resources/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('/condeto_admin/resources/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/condeto_admin/resources/categories/create', [App\Http\Controllers\CategoryController::class, 'insert'])->name('category.insert');
    Route::post('/condeto_admin/resources/categories/search', [App\Http\Controllers\CategoryController::class, 'search'])->name('category.search');
    Route::get('/condeto_admin/resources/categories/export', [App\Http\Controllers\CategoryController::class, 'export'])->name('category.export');


    Route::get('/condeto_admin/community/categories', [App\Http\Controllers\CategoryController::class, 'comm_index'])->name('community.index');
    Route::get('/condeto_admin/community/categories/create', [App\Http\Controllers\CategoryController::class, 'comm_create'])->name('community.create');
    Route::post('/condeto_admin/community/categories/create', [App\Http\Controllers\CategoryController::class, 'comm_insert'])->name('community.insert');
    Route::post('/condeto_admin/community/categories/search', [App\Http\Controllers\CategoryController::class, 'comm_search'])->name('community.search');
    Route::get('/condeto_admin/community/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'comm_edit'])->name('community.edit');
    Route::post('/condeto_admin/community/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'comm_update'])->name('community.update');
    Route::get('/condeto_admin/community/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'comm_delete'])->name('community.delete');
    Route::get('/condeto_admin/community/categories/export', [App\Http\Controllers\CategoryController::class, 'comm_export'])->name('community.export');
    Route::get('/condeto_admin/community/messages', [App\Http\Controllers\CategoryController::class, 'view_msg'])->name('msg.view');
    Route::post('/condeto_admin/community/messages/search', [App\Http\Controllers\CategoryController::class, 'search_msg'])->name('msg.search');
    Route::get('/condeto_admin/community/messages/export', [App\Http\Controllers\CategoryController::class, 'export_msg'])->name('msg.export');

    
    Route::get('/condeto_admin/facilities', [App\Http\Controllers\FacilityController::class, 'index'])->name('facilities.index');
    Route::get('/condeto_admin/facilities/create', [App\Http\Controllers\FacilityController::class, 'create'])->name('facility.create');
    Route::post('/condeto_admin/facilities/create', [App\Http\Controllers\FacilityController::class, 'insert'])->name('facility.insert');
    Route::post('/condeto_admin/facilities/search', [App\Http\Controllers\FacilityController::class, 'search'])->name('facility.search');
    Route::get('/condeto_admin/facilities/export', [App\Http\Controllers\FacilityController::class, 'export'])->name('facility.export');


    Route::get('/condeto_admin/events/deliveries', [App\Http\Controllers\EventController::class, 'delivery'])->name('delivery.index');
    Route::post('/condeto_admin/events/deliveries/search', [App\Http\Controllers\EventController::class, 'delivery_search'])->name('delivery.search');
    Route::get('/condeto_admin/events/deliveries/export', [App\Http\Controllers\EventController::class, 'export_delivery'])->name('delivery.export');
    Route::get('/condeto_admin/events/repairs', [App\Http\Controllers\EventController::class, 'repairs'])->name('repairs.index');
    Route::post('/condeto_admin/events/repairs/search', [App\Http\Controllers\EventController::class, 'repairs_search'])->name('repairs.search');
    Route::get('/condeto_admin/events/repairs/export', [App\Http\Controllers\EventController::class, 'export_repairs'])->name('repairs.export');
    Route::get('/condeto_admin/events/pickups', [App\Http\Controllers\EventController::class, 'pickups'])->name('pickups.index');
    Route::post('/condeto_admin/events/pickups/search', [App\Http\Controllers\EventController::class, 'pickups_search'])->name('pickups.search');
    Route::get('/condeto_admin/events/pickups/export', [App\Http\Controllers\EventController::class, 'export_pickups'])->name('pickups.export');
    Route::get('/condeto_admin/events/visitors', [App\Http\Controllers\EventController::class, 'visitors'])->name('visitors.index');
    Route::post('/condeto_admin/events/visitors/search', [App\Http\Controllers\EventController::class, 'visitors_search'])->name('visitors.search');
    Route::get('/condeto_admin/events/visitors/export', [App\Http\Controllers\EventController::class, 'export_visitors'])->name('visitors.export');
    Route::get('/condeto_admin/events/facility_bookings', [App\Http\Controllers\EventController::class, 'facility_bookings'])->name('facility_bookings.index');
    Route::post('/condeto_admin/events/facility_bookings/search', [App\Http\Controllers\EventController::class, 'facility_bookings_search'])->name('facility_bookings.search');
    Route::get('/condeto_admin/events/facility_bookings/export', [App\Http\Controllers\EventController::class, 'export_bookings'])->name('facility_bookings.export');


    Route::get('/condeto_admin/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::post('/condeto_admin/payments/search', [App\Http\Controllers\PaymentController::class, 'search'])->name('payment.search');
    Route::get('/condeto_admin/payments/export', [App\Http\Controllers\PaymentController::class, 'export'])->name('payment.export');


    Route::get('/condeto_admin/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
    Route::post('/condeto_admin/messages/search', [App\Http\Controllers\MessageController::class, 'search'])->name('message.search');
    Route::get('/condeto_admin/messages/export', [App\Http\Controllers\MessageController::class, 'export_msg'])->name('message.export');


    Route::get('/condeto_admin/applications', [App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');


    Route::get('/condeto_admin/property_overview', [App\Http\Controllers\BuildingAdminController::class, 'propertyOverview'])->name('property.overview');
    Route::get('/condeto_admin/property_overview/export', [App\Http\Controllers\BuildingAdminController::class, 'propertyOverviewexport'])->name('property.overview.export');
    Route::post('/condeto_admin/property_overview/filter', [App\Http\Controllers\BuildingAdminController::class, 'propertyOverviewFilter'])->name('propertyOverview.filter');


    Route::get('/condeto_admin/revenue', [App\Http\Controllers\PaymentController::class, 'revenue'])->name('property.revenue');
    Route::get('/condeto_admin/revenue/export', [App\Http\Controllers\PaymentController::class, 'revenueexport'])->name('property.revenue.export');
    Route::post('/condeto_admin/revenue/filter', [App\Http\Controllers\PaymentController::class, 'revenueFilter'])->name('revenue.filter');


    // Route::get('/condeto_admin/users', [App\Http\Controllers\ApplicationController::class, 'index_user'])->name('users.index');


 });

 Route::get('/my_building/tasks_staff', [App\Http\Controllers\TaskController::class, 'index'])->name('task.index');
 Route::get('/tasks_list/{type}', [App\Http\Controllers\TaskController::class, 'taskDetail'])->name('task.detail');


 Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
 Route::get('/reports/run_report/repairs', [App\Http\Controllers\ReportController::class, 'run_reports'])->name('runreport.index');
 Route::post('/reports/run_report/repairs', [App\Http\Controllers\ReportController::class, 'create_reports'])->name('runreport.create');
 Route::get('/reports/run_report/facilities', [App\Http\Controllers\ReportController::class, 'facilityForm'])->name('facility.index');
 Route::post('/reports/run_report/facilities', [App\Http\Controllers\ReportController::class, 'create_facility'])->name('facility.submit');
 Route::get('/reports/run_report/payments', [App\Http\Controllers\ReportController::class, 'paymentForm'])->name('payment.form');
 Route::post('/reports/run_report/payments', [App\Http\Controllers\ReportController::class, 'payment_submit'])->name('payment.submit');


 Route::get('/building/{id?}', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
 Route::get('/properties_list/{id}/apartments', [App\Http\Controllers\PropertyController::class, 'view_apart'])->name('apart.view');
 Route::get('/properties_list/{id}', [App\Http\Controllers\PropertyController::class, 'view_tenants'])->name('tenants.view');
 Route::get('/properties_list/{id}/{build_id}/tenants/add_new', [App\Http\Controllers\PropertyController::class, 'add_tenants'])->name('tenants.add');
 Route::post('/properties_list/{id}/tenants/add_new', [App\Http\Controllers\PropertyController::class, 'addnewtenant'])->name('addnewtenant');
 Route::get('/properties_list/{id}/{build_id}/tenants', [App\Http\Controllers\PropertyController::class, 'viewtenant'])->name('viewtenant');
 Route::post('/buildinglogo/{id}', [App\Http\Controllers\PropertyController::class, 'building_logo'])->name('building.logo');
 Route::post('/apartment_email', [App\Http\Controllers\PropertyController::class, 'apartment_email'])->name('apartment.email');
 Route::post('/post/message_building', [App\Http\Controllers\PropertyController::class, 'message_post'])->name('message.post');


 Route::get('/messages', [App\Http\Controllers\MessageController::class, 'view_usermsg'])->name('usermsg.view');
 Route::get('/messages/{id}', [App\Http\Controllers\MessageController::class, 'msgDetail'])->name('messages.detail');
 Route::post('/messages/{id}', [App\Http\Controllers\MessageController::class, 'msgreply'])->name('message.reply');


 Route::get('/building/staff/add_new', [App\Http\Controllers\BuildingController::class, 'index'])->name('building.index');
 Route::post('/building/staff/add_new', [App\Http\Controllers\BuildingController::class, 'staff_add'])->name('staff.add');


 Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile.edit');
 Route::post('/profile/{id}', [App\Http\Controllers\DashboardController::class, 'update_profile'])->name('profile.update');


 Route::get('/my_building', [App\Http\Controllers\TenantsBuildingController::class, 'my_building'])->name('mybuilding.index');

 Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'application_view'])->name('applications.view');
 Route::get('/tasks_list', [App\Http\Controllers\ApplicationController::class, 'task_view'])->name('task.view');
 Route::get('/tasks_lists/{id}', [App\Http\Controllers\ApplicationController::class, 'task_viewDetail'])->name('task.view.detail');

 Route::get('/tasks_list_pickup', [App\Http\Controllers\ApplicationController::class, 'task_view_pickup'])->name('task.view.pickup');
 Route::get('/tasks_list_pickup/{id}', [App\Http\Controllers\ApplicationController::class, 'task_viewDetailPickup'])->name('task.view.detail.pickup');


 Route::get('/tasks_list_delivery', [App\Http\Controllers\ApplicationController::class, 'task_view_delivery'])->name('task.view.delivery');
 Route::get('/tasks_list_delivery/{id}', [App\Http\Controllers\ApplicationController::class, 'task_viewDetailDelivery'])->name('task.view.detail.delivery');


 Route::get('/tasks_list_repairs', [App\Http\Controllers\ApplicationController::class, 'task_view_repair'])->name('task.view.repair');
 Route::get('/tasks_list_repairs/{id}', [App\Http\Controllers\ApplicationController::class, 'task_viewDetailRepair'])->name('task.view.detail.repair');

 Route::get('/facility_bookings', [App\Http\Controllers\ApplicationController::class, 'facility_view'])->name('facility.view');



 Route::get('/makepayment/{reference}', [App\Http\Controllers\PaymentController::class, 'getPaymentScreen'])->name('payment.view');
 Route::get('/makepayment/facility/{reference}/{price}/{event_id}', [App\Http\Controllers\PaymentController::class, 'getFacilityPaymentScreen'])->name('facility.payment.view');
 Route::post('/makepayment/facility/{reference}', [App\Http\Controllers\PaymentController::class, 'getFacilityPaymentSuccess'])->name('facility.payment.success');
 Route::post('/makepayment/{reference}', [App\Http\Controllers\PaymentController::class, 'getPaymentSuccess'])->name('payment.success');
 Route::post('/makepayment/{reference}/{id}', [App\Http\Controllers\PaymentController::class, 'getPaymentSuccessApplication'])->name('application.payment.success');


 Route::get('/my_building/repairs', [App\Http\Controllers\TenantsBuildingController::class, 'repairs'])->name('mybuilding.repairs');
 Route::post('/my_building/repairs', [App\Http\Controllers\TenantsBuildingController::class, 'repairsSend'])->name('sendreq.repairs');


 Route::get('/my_building/concierge', [App\Http\Controllers\TenantsBuildingController::class, 'concierge'])->name('mybuilding.concierge');
 Route::post('/my_building/concierge', [App\Http\Controllers\TenantsBuildingController::class, 'conciergeSend'])->name('mybuilding.conciergesend');


 Route::get('/my_building/resources', [App\Http\Controllers\TenantsBuildingController::class, 'resourcesPage'])->name('mybuilding.resources');
 Route::get('/my_building/resources/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'resourcesDetail'])->name('mybuilding.resourcesdetail');


 Route::get('/my_building/repairs/my_repairs', [App\Http\Controllers\TenantsBuildingController::class, 'myrepairs'])->name('mybuilding.myrepairs');
 Route::get('/my_building/repairs/my_repairs/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myrepairsDetail'])->name('mybuilding.myrepairsdetail');
 Route::post('/my_building/repairs/my_repairs/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myrepairsUpdate'])->name('mybuilding.myrepairsUpdate');
 Route::post('/my_building/repairs/my_repairs/new/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myrepairsNewNote'])->name('mybuilding.newnote');


 Route::get('/my_building/deliveries/my_deliveries', [App\Http\Controllers\TenantsBuildingController::class, 'mydeliveries'])->name('mybuilding.mydeliveries');
 Route::get('/my_building/deliveries/my_deliveries/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mydeliveriesDetail'])->name('mybuilding.mydeliveriesDetail');
 Route::post('/my_building/deliveries/my_deliveries/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mydeliveriesUpdate'])->name('mybuilding.mydeliveriesUpdate');
 Route::post('/my_building/deliveries/my_deliveries/new/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mydeliveriesNewNote'])->name('mybuilding.mydeliveriesnewnote');



 Route::get('/my_building/pickups/my_pickups', [App\Http\Controllers\TenantsBuildingController::class, 'mypickups'])->name('mybuilding.mypickups');
 Route::get('/my_building/pickups/my_pickups/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mypickupsDetail'])->name('mybuilding.mypickupsDetail');
 Route::post('/my_building/pickups/my_pickups/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mypickupsUpdate'])->name('mybuilding.mypickupsUpdate');
 Route::post('/my_building/pickups/my_pickups/new/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'mypickupsNewNote'])->name('mybuilding.mypickupsnewnote');


 Route::get('/my_building/visitors/my_visitors', [App\Http\Controllers\TenantsBuildingController::class, 'myvisitors'])->name('mybuilding.mypickups');
 Route::get('/my_building/visitors/my_visitors/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myvisitorsDetail'])->name('mybuilding.myvisitorsDetail');
 Route::post('/my_building/visitors/my_visitors/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myvisitorsUpdate'])->name('mybuilding.myvisitorsUpdate');
 Route::post('/my_building/visitors/my_visitors/new/{id}', [App\Http\Controllers\TenantsBuildingController::class, 'myvisitorsNewNote'])->name('mybuilding.myvisitorsnewnote');


 Route::get('/apply', [App\Http\Controllers\TenantsApartmentsController::class, 'apply'])->name('apply.apartment');
 Route::post('/apply/search',[App\Http\Controllers\TenantsApartmentsController::class, 'showApartments'])->name('apartment.search');
 Route::post('/apply/new',[App\Http\Controllers\TenantsApartmentsController::class, 'newApartments'])->name('apartment.applynew');
 Route::get('/apply/payment/{reference}/{price}/{id}',[App\Http\Controllers\TenantsApartmentsController::class, 'paymentApplication'])->name('payment.application');


 Route::get('/my_building/facilities/book',[App\Http\Controllers\TenantsApartmentsController::class, 'myfacility'])->name('myfacility');
 Route::post('/my_building/facilities/book',[App\Http\Controllers\TenantsApartmentsController::class, 'myfacilityBook'])->name('myfacility.book');


 Route::get('/my_building/facilities/my_bookings',[App\Http\Controllers\TenantsApartmentsController::class, 'myfacilityview'])->name('myfacility.facilityview');
