<?php

namespace App\Http\Controllers;
use App\Models\Property;
Use App\Models\Payments;
use App\Models\AptUsers;
use App\Models\Messages;
use App\Models\Event;
use App\Models\User;
use App\Models\UserPropertyRelation;
use Auth;
use App\Mail\ApplicationEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Mail::to('talhauos1@gmail.com')->send(new ApplicationEmail);
        
        // echo '<pre>';
        // print_r($building);exit;
        $admin = AptUsers::where('user_id',Auth::id())->first();
        // echo '<pre>';
        // print_r($admin);exit;
     
        if($admin->is_super_admin == 1 || $admin->is_admin == 1)
        {
            // $message = Messages::where('user_id',Auth::id())->get();
            $message = Messages::where('user_id',Auth::id())->where('type_id',4)->leftJoin('users', 'apt_apply_messages.object_id', '=', 'users.id')
            ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
            ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name',)
            ->get();
        //     echo '<pre>';
        // print_r($message);exit;
          $property = Property::where('parent_property_id',40)->get();
        if($admin->is_admin == 1)
        {
         
            $property = Property::where('parent_property_id',40)->get();
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();
            $facility = Event::where('sub_type_id',6)
            ->get();
            $visitor = Event::
            where('apt_apply_events.sub_type_id',2006)
            ->leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.id')
            ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
            ->where('apt_apply_events.status',0)
            ->where('apt_apply_messages.parent_message_id',NULL)
            ->get();
            $pickup = Event::
            where('apt_apply_events.sub_type_id',2007)
            ->leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.id')
            ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
            ->where('apt_apply_events.status',0)
            ->where('apt_apply_messages.parent_message_id',NULL)
            ->get();
            $delivery = Event::
            where('apt_apply_events.sub_type_id',38)
            ->leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.id')
            ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
            ->where('apt_apply_events.status',0)
            ->where('apt_apply_messages.parent_message_id',NULL)
            ->get();
            $repairs = Event::
         // where('object_id',$apartment->id)
         // where('user_id',Auth::user()->id)
         leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
         ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
         ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
         ->where('apt_apply_events.status',0)
         ->where('apt_apply_events.type_id',46)
         ->where('apt_apply_messages.parent_message_id',NULL)
        //  ->where('apt_apply_events.id','apt_apply_messages.object_id')
         ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
         ->get();


         $message = Messages::
        where('parent_message_id',NULL)
        ->where('type_id',4)
        ->whereNotNull('message')
        ->where(function ($query) {
            $query->where('user_id', '=', Auth::id())
                  ->orWhere('object_id', '=', Auth::id());
        })
        
        
        // ->leftJoin('users', 'apt_apply_messages.object_id', '=', 'users.id')
        ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->orderBy('id','DESC')->get();



            // echo '<pre>';
            // print_r($property);exit;
            return view('front.managerDashboard',compact('property','user_building','facility','visitor','pickup','delivery','repairs','message'));
           
        }
          return view('front.dashboard',compact('property'));
        }
        elseif($admin->is_admin == 0)
        {
            //  echo '<pre>';
            // print_r($admin);exit;
            
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
            if(!$user_building)
            {
                return view('tenant.tenantdashboard');
            }
            
            $apartment =  Property::where('id',$user_building->property_id)->first();
            $building =  Property::where('id',$apartment->parent_property_id)->first();
            $property = Property::where('parent_property_id',40)->get();


            $apa = Property::where('parent_property_id',$building->id)->first();
            $payment = Payments::where('user_id',Auth::id())->where('object_id',$apa->id)->latest()->first();


        $repairs_request = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',NULL)
        ->where('apt_apply_events.sub_type_id','!=',0)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        // ->where('apt_apply_events.id','apt_apply_messages.object_id')
        ->select('apt_apply_events.id')
        ->get();


        $delivery = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',38)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        $pickup = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',2007)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',2006)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();
        $facility = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',8)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();
       

        $all_apartments = Property::where('type_id',30)
        ->where('listing_id','!=',NULL)
        ->where('brokerage_id',5065)
        ->leftJoin('listings', 'apt_apply_property.listing_id', '=', 'listings.id')
        ->select('apt_apply_property.*', 'listings.address')
        ->get();
        // echo '<pre>';
        // print_r(count($repairs_request));exit;



            return view('tenant.dashboard',compact('property','building','payment','repairs_request','delivery','pickup','visitor','facility','all_apartments'));
        }
        
    }
    public function profile()
    {
        

        $user = Auth::user();
        $property = Property::where('parent_property_id',40)->get();
        $admin = AptUsers::where('user_id',Auth::id())->first();
     
        if($admin->is_super_admin == 1 || $admin->is_admin == 1)
        {
            return view('front.profile.edit',compact('property','user'));
        }
        elseif($admin->is_admin == 0)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
            $property = Property::where('parent_property_id',40)->get();
            return view('tenant.profile.edit',compact('property','user','building'));
        }

    }
 
    public function update_profile(Request $request, $id)
    {
        // $date = date("d-m-Y",mktime(0, 0, 0, $request->date_of_birth_day, $request->date_of_birth_month, $request->date_of_birth_year));
        $date = Carbon::createFromDate($request->date_of_birth_year, $request->date_of_birth_month, $request->date_of_birth_day);
        // echo '<pre>';
        // print_r($date);exit;
        $user = User::find($request->id);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('img'),$filename);
            $user->image = $filename;
        }
       
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email_address;
        
        $user->password = $request->new_password ? Hash::make($request->new_password) : $user->password;
        $user->dob = $date;
        $user->notify_email = $request->email_notifications;
        $user->notify_push = $request->push_notifications;
        $user->update();
        return redirect()->back();
        //  echo '<pre>';
        // print_r($user);exit;
        // $property = Property::where('parent_property_id',40)->get();
        // return view('front.profile.edit',compact('property','user'));
    }
}
