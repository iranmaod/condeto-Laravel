<?php

namespace App\Http\Controllers;
use App\Models\PropertyUser;
use App\Models\Property;
use App\Models\User;
use App\Models\UserPropertyRelation;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use App\Exports\TenantsExport;
use App\Exports\StaffExport;
use App\Exports\ComplexManagerExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
class PropertyUsersController extends Controller
{
    public function tenents()
    {
        $tenents =  UserPropertyRelation::
		select('apt_apply_user_property_relationship.*','users.email','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')->
		leftJoin('users','users.id','=','apt_apply_user_property_relationship.user_id')->
		leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')->
		leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->orderBy('id', 'DESC')->paginate(15);
        // echo '<pre>';
        // print_r($tenents);exit;

        // $tenents = PropertyUser::where('role_type','tenent')->
        // leftJoin('users', 'property_users.user_id', '=', 'users.id')
        // ->select('property_users.*','users.name')
        // ->get();
        return view('admin.propertyusers.tenents',compact('tenents'));
    }
    public function tenants_search(Request $request)
    {
          
    //    $user = User::where();   
          

       $tenents =  UserPropertyRelation::
       select('apt_apply_user_property_relationship.*','users.email','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')->
       leftJoin('users','users.id','=','apt_apply_user_property_relationship.user_id')->
       leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')->
       leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
       ->where('first_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('description', 'LIKE', "%{$request->search_text}%")
       ->orderBy($request->sortby, $request->sort)->paginate(15);
    //    echo '<pre>';
    //    print_r($tenents);exit;

       
    // $building = Property::where('parent_property_id',40)->paginate(15);
    return view('admin.propertyusers.search',compact('tenents'));
    }

    public function staff()
    {
      
        $tenents = UserPropertyRelation::leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_user_property_relationship.type_id',21)
        ->orWhere('apt_apply_user_property_relationship.type_id',22)
        ->orWhere('apt_apply_user_property_relationship.type_id',23)
       
        ->select('apt_apply_user_property_relationship.*','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')
        ->paginate(15);
        return view('admin.propertyusers.staff',compact('tenents'));
    }

    public function staff_search(Request $request)
    {

        $tenents = UserPropertyRelation::leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_types.id',22)
        ->orWhere('apt_apply_types.id',23)
        ->select('apt_apply_user_property_relationship.*','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('description', 'LIKE', "%{$request->search_text}%")
       ->orderBy($request->sortby, $request->sort)->paginate(15);
          
     
      
    //    echo '<pre>';
    //    print_r($tenents);exit;

       
    // $building = Property::where('parent_property_id',40)->paginate(15);
    return view('admin.propertyusers.staff_search',compact('tenents'));
    }


    public function removestaff($id)
    {
        $staff = PropertyUser::find($id);
        $staff->delete();
        return redirect()->back();
    }
    public function import()
    {
        return view('admin.propertyusers.import');
    }

    public function usersImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

   
    public function tenants_export() 
    {
        return Excel::download(new TenantsExport, 'tenants.csv');
    }
    public function staff_export() 
    {
        return Excel::download(new StaffExport, 'staff.csv');
    }

    public function adminManager()
    {
      
        $tenents = UserPropertyRelation::leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_user_property_relationship.type_id',52)
        ->select('apt_apply_user_property_relationship.*','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')
        ->paginate(15);
        return view('admin.propertyusers.complex',compact('tenents'));
    }
    public function adminManagerEdit($id)
    {
        $property = Property::where('type_id',29)->get();
        $user = UserPropertyRelation::
        leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_user_property_relationship.id',$id)
        ->select('users.*','apt_apply_property.name as property_name','apt_apply_property.id as property_id')
        ->first();
        return view('admin.propertyusers.complexedit',compact('user','property'));
    }

    public function adminManagerUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);


        $property = UserPropertyRelation::find($id);
        $property->property_id = $request->property;
        $property->update();

        $user_manager = User::where('id',$property->id)->first();

        $user = DB::table('users')
        ->where('id', $user_manager->id)
        ->update([
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('admin.complex.manager');
        // echo '<pre>';
        // print_r($user);exit;
    }

    public function adminManagerNew()
    {
        $property = Property::where('type_id',29)->get();
        return view('admin.propertyusers.complexnew',compact('property'));
    }
    public function adminManagerCreate(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);

        $user = new User();
        $user->email = $request->email;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->password = Hash::make($request->password);
        $user->username = preg_replace('/[^0-9a-zA-Z\-\s]/', '', $request->email);
        $user->confirmation_code = $code = Str::random(20);
        $user->twitter_url = 0;
        $user->google_url = 0;
        $user->phone = 0;
        $user->facebook_url = 0;
        $user->company = 0;
        $user->image = 0;
        $user->about_me = 0;
        $user->work_hours = 0;
        $user->view_count = 0;
    
        $user->save();

        $user_property = new UserPropertyRelation();
        $user_property->user_id = $user->id;
        $user_property->property_id = $request->property;
        $user_property->type_id = 52;
        $user_property->save();
        return redirect()->route('admin.complex.manager');
 
    }
    public function adminManagerDelete($id)
    {
        $property = UserPropertyRelation::find($id);
        $property->delete();
        return back();
    }

    public function adminManagerExport()
    {
        return Excel::download(new ComplexManagerExport, 'complex_manager.csv');
    }

    public function adminManagerSearch(Request $request)
    {
        $tenents = UserPropertyRelation::leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_property','apt_apply_property.id','=','apt_apply_user_property_relationship.property_id')
        ->leftJoin('apt_apply_types','apt_apply_types.id','=','apt_apply_user_property_relationship.type_id')
        ->where('apt_apply_user_property_relationship.type_id',52)
        ->select('apt_apply_user_property_relationship.*','users.first_name','users.last_name','apt_apply_property.name as property_name', 'apt_apply_types.description as role')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('name', 'LIKE', "%{$request->search_text}%")
       ->orWhere('description', 'LIKE', "%{$request->search_text}%")
       ->orderBy($request->sortby, $request->sort)->paginate(15);


        return view('admin.propertyusers.complex',compact('tenents'));
    }

}
