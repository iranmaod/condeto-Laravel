<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;
use Auth;
use App\Models\Type;
use App\Models\Listing;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PropertyImport;
use App\Exports\BuildingExport;
use App\Exports\ComplexExport;
class BuildingAdminController extends Controller
{
    public function index()
    {
        $building = Property::where('parent_property_id',40)->paginate(15);
        return view('admin.buildings.index',compact('building'));
    }
    public function search(Request $request)
    {

        // if($request->sort == 'ASC')
        // {
        //     
        // }
        // echo '<pre>';
        //  print_r($request->all());exit;
        // if($request->type == 'ENEQ')
        // {
        //     $building = Property::query()
        //     ->where('name', '<>', "%{$request->search_text}%") 
        //     ->orWhere('city', '<>', "%{$request->search_text}%") 
        //     ->orWhere('zip', '<>', "%{$request->search_text}%") 
        //     ->orWhere('state', '<>', "%{$request->search_text}%") 
        //     ->orderBy($request->sortby, $request->sort)->get();

        // }

          
            $building = Property::query()
            ->where('name', 'LIKE', "%{$request->search_text}%") 
            ->orWhere('city', 'LIKE', "%{$request->search_text}%") 
            ->orWhere('zip', 'LIKE', "%{$request->search_text}%") 
            ->orWhere('state', 'LIKE', "%{$request->search_text}%") 
            ->orderBy($request->sortby, $request->sort)->get();
        
      
         

        // $building = Property::where('parent_property_id',40)->paginate(15);
        return view('admin.buildings.search',compact('building'));
    }
    

    public function create()
    {
        return view('admin.buildings.create');
    }

    public function add(Request $request)
    {
        $building = new Property();
        $building->name = $request->building_name;
        $building->parent_property_id = $request->complex_id;
        $building->type_id = $request->property_type_building;
        $building->state = $request->state;
        $building->city = $request->city;
        $building->zip = $request->zip;
        $building->save();
        return redirect()->route('buildings.index');
        
    }

    public function edit($id)
    {
        $building = Property::find($id);
        return view('admin.buildings.edit',compact('building'));
    }

    public function update(Request $request, $id)
    {
        $building = Property::find($id);
        $building->name = $request->building_name;
        $building->parent_property_id = $request->complex_id;
        $building->type_id = $request->property_type_building;
        $building->state = $request->state;
        $building->city = $request->city;
        $building->zip = $request->zip;
        $building->update();
        return redirect()->route('buildings.index');
    }

    public function delete($id)
    {
        $building = Property::find($id);
        $building->delete();
        return redirect()->back();
    }

    public function xml()
    {
        return view('admin.buildings.xml');
    }
    public function propertyXml(Request $request)
    {


        if($request->hasFile('property_file')){
            $file = $request->file('property_file');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $path = $file->move(public_path('img'),$filename);
        }

        // echo '<pre>';
        // print_r($file);exit;

        $xmlString = file_get_contents($path);
        $xmlObject = simplexml_load_string($xmlString);

        foreach($xmlObject as $item)
        {
            foreach($item->buildings->building as $building)
            {
                foreach($building->apartments->apartment as $apartment)
                {
                $listing = new Property();
                $listing->type_id = 29;
                $listing->name = $building->name;
                $listing->fee = $apartment->fee;
                $listing->zip = $building->zip;
                $listing->state = $building->state;
                $listing->city = $building->city;
                $listing->save();
               
                
                }
                // echo '<pre>';
                // print_r($listing);exit;
                
                
            }
           
            

        }  
        return redirect()->back();         
        // $json = json_encode($xmlObject);
        // $phpArray = json_decode($json, true); 
       
    }
    public function property_csv()
    {
        return view('admin.buildings.import_csv');
    }
    public function import_property_csv(Request $request)
    {
        // print_r($request->all());exit;
		Excel::import(new PropertyImport, $request->file('file')->store('temp'));
        return back();
    }

    public function building_export() 
    {
        return Excel::download(new BuildingExport, 'property.csv');
    }
    public function building_search($id) 
    {
        $building_id = $id;
        $building = Property::where('parent_property_id',$id)->get();
        // echo '<pre>';
        //  print_r($building);exit;
        return view('admin.buildings.apartment_search',compact('building','building_id'));
    }


    public function adminComplex()
    {
        $property = Property::where('type_id',29)->get();
        $complex = Property::where('type_id',29)->paginate(15);
        return view('admin.complex.index',compact('complex','property'));
    }
    public function adminComplexEdit($id)
    {
        $complex = Property::find($id);
        return view('admin.complex.edit',compact('complex'));
    }
    public function adminComplexUpdate(Request $request, $id)
    {
        $complex = Property::find($id);
        $complex->name = $request->complex_name;
        $complex->stripe_charge_percent = $request->stripe_fee;
        $complex->update();
        return redirect()->route('admin.complex');
    }

    public function adminComplexNew()
    {
        return view('admin.complex.create');
    }
    public function adminComplexCreate(Request $request)
    {
        $complex = new Property();
        $complex->name = $request->complex_name;
        $complex->type_id = 29;
        $complex->stripe_charge_percent = $request->stripe_fee;
        $complex->save();
        return redirect()->route('admin.complex');
    }

    public function adminComplexDelete($id)
    {
        $complex = Property::find($id);
        $complex->delete();
        return redirect()->route('admin.complex');
    }

    public function adminComplexExport() 
    {
        return Excel::download(new ComplexExport, 'complex.csv');
    }

    public function adminComplexSearch(Request $request)
    {

        $property = Property::where('type_id',29)->get();

        $complex = Property::query()
        ->where('name', 'LIKE', "%{$request->search_text}%") 
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return view('admin.complex.index',compact('complex','property'));     
    }

    public function propertyOverview()
    {
        $building = Property::where('type_id',29)->get();
        $property = Property::where('type_id',29)->get();
        
        return view('admin.buildings.overview',compact('property','building'));
    }

    public function propertyOverviewexport()
    {

        return Excel::download(new ComplexExport, 'property_overview.csv');
    }

    public function propertyOverviewFilter(Request $request)
    {
        $building = Property::where('type_id',29)->get();
        $property = Property::query()
        ->where('name', 'LIKE', "%{$request->property}%") 
        ->get();
        return view('admin.buildings.overview',compact('property','building'));
    }

}
