<?php

namespace App\Http\Controllers;
use App\Models\Facility;
use App\Models\Property;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FacilityExport;
class FacilityController extends Controller
{
    public function index()
    {
        $facility = Facility::leftJoin('apt_apply_property', 'facilities.property_id', '=', 'apt_apply_property.id')
        ->select('facilities.*','apt_apply_property.name','apt_apply_property.state','apt_apply_property.city')
        ->get();
        return view('admin.facility.index',compact('facility'));
    }


    public function search(Request $request)
    {
        $facility = Facility::leftJoin('apt_apply_property', 'facilities.property_id', '=', 'apt_apply_property.id')
        ->select('facilities.*','apt_apply_property.name','apt_apply_property.state','apt_apply_property.city')
        ->where('name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('state', 'LIKE', "%{$request->search_text}%")
        ->orWhere('city', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.facility.search',compact('facility'));
    }

    public function create()
    {
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.category.create',compact('buildings'));
    }
    public function insert(Request $request)
    {
        $category = new Facility();
        $category->property_id = $request->building_id;
        $category->facility_name = $request->name;
        $category->description = $request->name;
        $category->save();
        return redirect()->route('facility.index');
    }

    public function export()
    {
        return Excel::download(new FacilityExport, 'facility.csv');
    }
}
