<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\AptUsers;
use App\Models\Types;
use App\Models\Listing;
use App\Models\Messages;
use App\Models\UserPropertyRelation;
use Illuminate\Support\Str;
use App\Mail\ApplicationEmail;
use App\Mail\MessageEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index($id = null)
    {
        if(!empty($id))
        {
            $buildinglogo = Property::find($id);
            $property = Property::where('parent_property_id',40)->get();
        //       echo '<pre>';
        // print_r($buildinglogo);exit;
            return view('front.property.index',compact('property','buildinglogo'));
        }
        $buildinglogo = Property::all();
        $property = Property::where('parent_property_id',40)->get();
        // $building = Property::where('parent_property_id',$id)->get();
        //   echo '<pre>';
        // print_r($buildinglogo);exit;
        return view('front.property.index',compact('property','buildinglogo'));
    }
  
    public function view_apart($id)
    {
        $property = Property::where('parent_property_id',40)->get();

        $building = Property::where('parent_property_id',$id)->get();
        $address = Property::find($id);
        // $apartment = Listing::where()
        // echo '<pre>';
        // print_r($building);exit;
        return view('front.property.apartment',compact('building','property','address'));
    }
    public function view_tenants($id)
    {
        $property = Property::where('parent_property_id',40)->get();
        $building = Property::where('parent_property_id',$id)->get();
        $address = Property::find($id);
        // $apartment = Listing::where()
        // echo '<pre>';
        // print_r($building);exit;
        return view('front.property.tenants',compact('building','property','address'));
    }
    public function building_logo(Request $request, $id)
    {
        $building = Property::find($id);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('img'),$filename);
            $building->logo = $filename;
        }
        $building->update();
        return redirect()->back();
        // print_r($id);exit;
    }

    public function add_tenants($build_id,$id)
    {
        $apartment = Property::where('parent_property_id',$id)->first();
        $building = Property::find($id);
        $property = Property::where('parent_property_id',40)->get();
        // echo '<pre>';
        // print_r($apartment);exit;
       return view('front.property.add_tenent',compact('property','apartment','building'));
        // print_r($id);exit;
    }
    public function addnewtenant(Request $request, $id)
    {
        // $apartment = Property::where('parent_property_id',$id)->first();
        // $building = Property::find($id);
        // echo '<pre>';
        // print_r($request->all());exit;
        $generated_password = Str::random(8);
        $date = Carbon::createFromDate($request->move_in_date_year, $request->move_in_date_month, $request->move_in_date_day);
        $code = Str::random(20);
        $username = preg_replace('/[^0-9a-zA-Z\-\s]/', '', $request->email_address);
        $user = new User();
        $user->username = $username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email_address;
        $user->confirmation_code = $code;
        $user->twitter_url = 0;
        $user->google_url = 0;
        $user->facebook_url = 0;
        $user->phone = $request->phone_number;
        $user->company = 0;
        $user->image = 0;
        $user->about_me = 0;
        $user->work_hours = 0;
        $user->view_count = 0;
        $user->password = $generated_password;
		// $user->password_confirmation = $generated_password;
        $user->save();

        $user_id = $user->id;
        $aptuser = new AptUsers();
        $aptuser->user_id = $user_id;
        $aptuser->save();

        $user_property = new UserPropertyRelation();
        $user_property->property_id = $request->property_id;
        $user_property->user_id = $user_id;
        $user_property->type_id = 2008;
        $user_property->move_in_date = $date;
        $user_property->rent = $request->rent;
        $user_property->save();
        return redirect()->route('property.index');

    }

    public function viewtenant($id,$build_id)
    {
        
        $building = Property::find($id);
        $address = Property::find($build_id);
        $property = Property::where('parent_property_id',40)->get();

        $tenents = UserPropertyRelation::where('property_id',$id)->
        leftJoin('users', 'apt_apply_user_property_relationship.user_id', '=', 'users.id')
        ->select('apt_apply_user_property_relationship.*','users.first_name','users.last_name')->get();
        // echo '<pre>';
        // print_r($apartment);exit;
        return view('front.property.view_tenent',compact('property','tenents','building','address'));
    }

    public function apartment_email(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $buil_id = $request->apartment_id;
        $apar_id = $request->building_id;
        // $data = $request->all();
        Mail::to($request->email)->send(new ApplicationEmail($apar_id,$buil_id));
        return redirect()->back();
    }
    public function message_post(Request $request)
    {
      $propertyusers = UserPropertyRelation::where('property_id',$request->building_id)->get();
      
                
       
        foreach($propertyusers as $user)
        {
            $types = Types::where('id',$user->type_id)->first();
        //      echo '<pre>';
        // print_r($types->id);exit;
            $message = new Messages();
            $message->type_id  = $types->id;
            $message->user_id  = $user->user_id;
            $message->title  = $request->subject;
            $message->message  = $request->message;
            $message->save();
            Mail::to('talhauos1@gmail.com')->send(new MessageEmail($message));
        }
                
               
            
        return redirect()->back();
    }
}
