<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Property;
use App\Models\Types;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $property = Property::where('parent_property_id',40)->get();
        return view('front.report.index',compact('property'));
    }

    public function run_reports()
    {
        $task = Types::where('parent_type_id',46)->get();

        $property = Property::where('parent_property_id',40)->get();
       
        return view('front.report.run_report',compact('task','property'));
    }
    public function create_reports(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $start_date = Carbon::createFromDate($request->from_year, $request->from_month, $request->from_day);        
        $end_date = Carbon::createFromDate($request->to_year, $request->to_month, $request->to_day);
        $category_id = $request->category;
        // echo '<pre>';
        // print_r($start_date);exit;
        $filter = Event::where('start_time',$start_date)->where('end_time',$end_date)->where('sub_type_id',$category_id)->get();
        // echo '<pre>';
        // print_r($filter);exit;  

        $property = Property::where('parent_property_id',40)->get();
       
        return view('front.report.filter',compact('filter','property'));
    }
    public function facilityForm()
    {

        $property = Property::where('parent_property_id',40)->get();
       
        return view('front.report.facility',compact('property'));
    }
    public function create_facility(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $start_date = Carbon::createFromDate($request->from_year, $request->from_month, $request->from_day);        
        $end_date = Carbon::createFromDate($request->to_year, $request->to_month, $request->to_day);
        $category_id = $request->category;
        // echo '<pre>';
        // print_r($start_date);exit;
        $filter = Event::where('start_time',$start_date)->where('end_time',$end_date)->where('sub_type_id',$category_id)->get();
        // echo '<pre>';
        // print_r($filter);exit;  

        $property = Property::where('parent_property_id',40)->get();
       
        return view('front.report.facility_filter',compact('filter','property'));
    }
    public function paymentForm()
    {
        $property = Property::where('parent_property_id',40)->get();
              
        return view('front.report.payment',compact('property'));
    }

    public function payment_submit(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $start_date = Carbon::createFromDate($request->from_year, $request->from_month, $request->from_day);        
        $category_id = $request->category;
        // echo '<pre>';
        // print_r($start_date);exit;
        // $filter = Event::where('start_time',$start_date)->where('end_time',$end_date)->where('sub_type_id',$category_id)->get();
        // echo '<pre>';
        // print_r($filter);exit;  

        $property = Property::where('parent_property_id',40)->get();
       
        return view('front.report.payment_filter',compact('property'));
    }
}
