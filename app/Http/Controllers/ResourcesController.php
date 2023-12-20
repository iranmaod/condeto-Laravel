<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Resource;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResourceExport;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $Resource = Resource::leftJoin('apt_apply_property', 'resources.building_id', '=', 'apt_apply_property.id')
        ->select('resources.*','apt_apply_property.name')
        ->get();
        return view('admin.resources.index',compact('Resource'));
    }
    public function search(Request $request)
    {
        //    echo '<pre>';
        // print_r($request->all());exit;
        $Resource = Resource::leftJoin('apt_apply_property', 'resources.building_id', '=', 'apt_apply_property.id')
        ->select('resources.*','apt_apply_property.name')
        ->where('title', 'LIKE', "%{$request->search_text}%")
        ->orWhere('description', 'LIKE', "%{$request->search_text}%")
        ->orWhere('name', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        // echo '<pre>';
        // print_r($Resource);exit;
        return view('admin.resources.search',compact('Resource'));
    }
    public function create_resource()
    {
        $buildings = Property::where('parent_property_id',40)->get();
        return view('admin.resources.create',compact('buildings'));
    }

    public function insert_resource(Request $request)
    {
        // print_r($request->all());exit;

        if($request->hasFile('document'))
        {
        
        $file = $request->file('document');
        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'files';

        // Upload file
        $file->move($location,$filename);

        }
        // print_r($fileNameToStore);exit;
        $resource = new Resource();
        $resource->building_id = $request->building_id;
        $resource->category_id = $request->category_id;
        $resource->title = $request->title;
        $resource->description = $request->description;
        $resource->document = $file;
        $resource->save();

        return redirect()->route('resource.index');
    }

    public function export_resource() 
    {
        return Excel::download(new ResourceExport, 'resource.csv');
    }
}
