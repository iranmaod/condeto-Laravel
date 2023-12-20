<?php

namespace App\Http\Controllers;
use App\Models\Applications;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Event;
use App\Models\Messages;
use App\Models\AptUsers;
use App\Models\UserPropertyRelation;
use Auth;
use App\Models\Property;
class ApplicationController extends Controller
{
    public function index()
    {
        $application = Applications::all();
        // echo '<pre>';
        // print_r($application);exit;
        return view('admin.application.index',compact('application'));
    }
    public function index_user()
    {
        return view('admin.user');
    }

    public function application_view()
    {
        $property = Property::where('parent_property_id',40)->get();
        return view('front.application.index',compact('property'));
    }
    public function task_view()
    {
        $property = Property::where('parent_property_id',40)->get();


        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();



        $pending_visitor = Event::
    
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',NUll || 0)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',2006)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
        $complete_visitor = Event::
      
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',2006)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
           

        // echo '<pre>';
        //  print_r($complete_visitor);exit;
        return view('manager.application.task',compact('user_building','pending_visitor','complete_visitor'));
        }




        return view('front.application.task',compact('property'));
    }


    public function task_viewDetail($id)
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();


       
        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.sub_type_id',2006)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->first();




        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->get();
           

        // echo '<pre>';
        //  print_r($message);exit;
        return view('manager.application.visitors',compact('user_building','visitor','message'));
        }
    }


    public function facility_view()
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();


        $facility = Event::where('sub_type_id',6)
        ->leftJoin('apt_apply_property', 'apt_apply_events.object_id', '=', 'apt_apply_property.id')
        ->leftJoin('apt_apply_facilities', 'apt_apply_events.type_id', '=', 'apt_apply_facilities.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','apt_apply_property.name','apt_apply_facilities.name as f_name','users.first_name','users.last_name','users.image')
        ->get();
           

        // echo '<pre>';
        //  print_r($facility);exit;
        return view('manager.application.facility',compact('user_building','facility'));
        }

        $property = Property::where('parent_property_id',40)->get();
        return view('front.application.facility',compact('property'));
    }



    public function task_view_pickup()
    {
        $property = Property::where('parent_property_id',40)->get();


        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();



        $pending_visitor = Event::
    
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',0)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',2007)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
        $complete_visitor = Event::
      
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',2007)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
           

        // echo '<pre>';
        //  print_r($complete_visitor);exit;
        return view('manager.application.pickup',compact('user_building','pending_visitor','complete_visitor'));
        }




        return view('front.application.task',compact('property'));
    }


    public function task_viewDetailPickup($id)
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();


       
        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.sub_type_id',2007)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->first();




        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->get();
           

        // echo '<pre>';
        //  print_r($message);exit;
        return view('manager.application.visitors',compact('user_building','visitor','message'));
        }
    }
    public function task_view_delivery()
    {
        $property = Property::where('parent_property_id',40)->get();


        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();



        $pending_visitor = Event::
    
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',0)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',38)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
        $complete_visitor = Event::
      
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.sub_type_id',38)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name')
        ->get();
           

        // echo '<pre>';
        //  print_r($complete_visitor);exit;
        return view('manager.application.delivery',compact('user_building','pending_visitor','complete_visitor'));
        }




        return view('front.application.task',compact('property'));
    }


    public function task_viewDetailDelivery($id)
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();


       
        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->where('apt_apply_events.sub_type_id',38)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->first();




        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->get();
           

        // echo '<pre>';
        //  print_r($message);exit;
        return view('manager.application.visitors',compact('user_building','visitor','message'));
        }
    }


    public function task_view_repair()
    {
        $property = Property::where('parent_property_id',40)->get();


        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();



            $unscheduled_repairs = Event::
            // where('object_id',$apartment->id)
            // where('user_id',Auth::user()->id)
            leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
            ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
            ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
            ->where('apt_apply_events.status',0)
            ->where('apt_apply_events.type_id',46)
            ->where('apt_apply_messages.parent_message_id',NULL)
            // ->where('apt_apply_events.id','apt_apply_messages.object_id')
            ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
            ->get();

        

         $scheduled_repairs = Event::
         // where('object_id',$apartment->id)
         // where('user_id',Auth::user()->id)
         leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
         ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
         ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
         ->where('apt_apply_events.status',1)
         ->where('apt_apply_events.type_id',46)
         ->where('apt_apply_messages.parent_message_id',NULL)
        //  ->where('apt_apply_events.id','apt_apply_messages.object_id')
         ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
         ->get();
        //  echo '<pre>';
        //  print_r($scheduled_repairs);exit;

        
        return view('manager.application.repair',compact('user_building','unscheduled_repairs','scheduled_repairs'));
        }




        return view('front.application.task',compact('property'));
    }


    public function task_viewDetailRepair($id)
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();
        if($admin->is_admin == 1)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->get();


             $visitor = Event::
            // where('object_id',$apartment->id)
            // where('user_id',Auth::user()->id)
            leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
            ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
            ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
            ->where('apt_apply_events.status',0)
            ->where('apt_apply_events.type_id',46)
            ->where('apt_apply_events.id',$id)
            ->where('apt_apply_messages.parent_message_id',NULL)
            // ->where('apt_apply_events.id','apt_apply_messages.object_id')
            ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','users.first_name','users.last_name','users.image')
            ->first();

        //     echo '<pre>';
        //  print_r($visitor);exit;


        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->get();
           

        
        return view('manager.application.visitors',compact('user_building','visitor','message'));
        }
    }

}
