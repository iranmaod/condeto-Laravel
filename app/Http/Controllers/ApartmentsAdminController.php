<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Listing;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ApartmentExport;
use App\Exports\BuildApartmentExport;
class ApartmentsAdminController extends Controller
{
    public function index()
    {
   
        $apartment = Property::orderBy('id', 'DESC')->where('parent_property_id','!=',40)->paginate(15);
        
        return view('admin.apartments.index',compact('apartment'));
    }

    public function create()
    {
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.apartments.create',compact('buildings'));
    }

    public function add(Request $request)
    {
        $building = Property::find($request->building_id);
        // echo '<pre>';
        // print_r($building);exit;
        
        $apartment = new Property();
        $apartment->name = $request->apartment_name;
        $apartment->parent_property_id = $building->id;
        $apartment->fee = $request->apartment_fee;
        $apartment->state = $building->state;
        $apartment->city = $building->city;
        $apartment->zip = $building->zip;
        $apartment->save();
        return redirect()->route('apartments.index');
    }

    public function edit($id)
    {
        $buildings = Property::where('parent_property_id',40)->get();
        $listing = Property::find($id);
        return view('admin.apartments.edit',compact('buildings','listing'));
    }

    public function update(Request $request, $id)
    {
        $building = Property::find($request->building_id);
        // echo '<pre>';
        // print_r($building->city);exit;
        $apartment = new Property();
        $apartment->name = $request->apartment_name;
        $apartment->parent_property_id = $request->building_id;
        $apartment->fee = $request->apartment_fee;
        $apartment->state = $building->state;
        $apartment->city = $building->city;
        $apartment->zip = $building->zip;
        $apartment->save();
        return redirect()->route('apartments.index');
    }

    public function delete($id)
    {
        $building = Property::find($id);
        $building->delete();
        return redirect()->back();
    }

    public function apartment_export()
    {
        return Excel::download(new ApartmentExport, 'apartment.csv');
    }
    public function building_apartment_export($id)
    {
        $building = Property::where('parent_property_id',$id)->get();
        //  echo '<pre>';
        // print_r($building);exit;
        return Excel::download(new BuildApartmentExport($id), 'building_apartment.csv');
    }
}
