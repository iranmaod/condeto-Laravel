<?php

namespace App\Http\Controllers;
use App\Models\Property;
Use App\Models\Payments;
use App\Models\Types;
use App\Models\Messages;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\UserPropertyRelation;
use App\Http\Controllers\DateTime;
use Auth;
use Illuminate\Http\Request;

class TenantsBuildingController extends Controller
{
    public function my_building()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        

        $apa = Property::where('parent_property_id',$building->id)->first();
        $payment = Payments::where('user_id',Auth::id())->where('object_id',$apa->id)->latest()->first();
        // echo '<pre>';
        // print_r($payment);exit;

        return view('tenant.building.index',compact('building','payment'));
    }
    public function repairs()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $task = Types::where('parent_type_id',46)->get();
        // echo '<pre>';
        // print_r($payment);exit;

        return view('tenant.building.repairs',compact('building','task'));
    }
    public function repairsSend(Request $request)
    {
        //  echo '<pre>';
        //  print_r($request->all());exit;
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $task = Types::where('parent_type_id',46)->get();

        $event = new Event();
        $event->type_id = 46;
        $event->sub_type_id = $request->type_id;
        $event->object_id = $apartment->id;
        $event->status = 0;
        $event->sub_type_id = $request->type_id;
        $event->start_time = date('Y-m-d H:i:s');
        $event->create_time = date('Y-m-d H:i:s');
        $event->user_id = Auth::user()->id;
        $event->save();

        $msg = new Messages();
        $msg->type_id = $request->type_id;
        $msg->object_id  = $event->id;
        $msg->user_id   = Auth::user()->id;
        $msg->title   = 'Repair request';
        $msg->message   = $request->repair_detail .' The user has given permission to enter the apartment un-attended.';
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->save();
        // echo '<pre>';
        // print_r($payment);exit;

        return back();
    }
    public function concierge()
    {
      
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        // echo '<pre>';
        // print_r($payment);exit;

        return view('tenant.building.concierge',compact('building'));
    }

    public function conciergeSend(Request $request)
    {
        
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $task = Types::where('parent_type_id',46)->get();


        $date = $request->year . "-" . str_pad($request->month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($request->day, 2, "0", STR_PAD_LEFT);
        $startTime = date('Y-m-d H:i:s', strtotime("$date $request->estimated_time"));
        // echo '<pre>';
        // print_r($startTime);exit;
        $event = new Event();
        $event->type_id = $request->service_type;
        $event->sub_type_id = $request->service_type;
        $event->status = 0;
        $event->object_id = $building->id;
        $event->user_id = Auth::user()->id;
        $event->start_time = $startTime;
        $event->update_time = date('Y-m-d H:i:s');
        $event->create_time = date('Y-m-d H:i:s');
        $event->save();

        $msg = new Messages();
        $msg->type_id = $request->service_type;
        $msg->object_id  = $event->id;
        $msg->user_id   = Auth::user()->id;
        $msg->title   = 'Concierge request';
        $msg->message   = $request->item ;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
        // echo '<pre>';
        // print_r($payment);exit;

        return back();
    }
    public function resourcesPage()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        // echo '<pre>';
        // print_r($payment);exit;

        return view('tenant.building.resources',compact('building'));
    }
    public function resourcesDetail($id)
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
       
        if($id == 18)
        {
        // echo '<pre>';
        // print_r($id);exit;
            return view('tenant.building.tenantinfo',compact('building'));
        }
        elseif($id == 19){
            return view('tenant.building.houserules',compact('building'));
        }
        elseif($id == 20){
            return view('tenant.building.categorythree',compact('building'));
        }
        
    }

    public function myrepairs()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();


        $unscheduled_repairs = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.type_id',46)
        ->where('apt_apply_events.status',0)
        ->where('apt_apply_messages.parent_message_id',NULL)
        // ->orWhere('apt_apply_events.status',0)
        ->where('apt_apply_events.sub_type_id','!=',0)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        // ->where('apt_apply_events.id','apt_apply_messages.object_id')
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();



        //  echo '<pre>';
        // print_r($unscheduled_repairs);exit;

        $scheduled_repairs = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.type_id',46)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_messages.parent_message_id',NULL)
        ->where('apt_apply_events.start_time',NULL)
        ->where('apt_apply_events.sub_type_id','!=',0)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        // ->where('apt_apply_events.id','apt_apply_messages.object_id')
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();
       

        return view('tenant.building.myrepairs',compact('building','unscheduled_repairs','scheduled_repairs'));
    }

    public function myrepairsDetail($id)
    {

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();

        $repair_detail = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->first();


        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description')
        ->get();


        //  echo '<pre>';
        // print_r($message);exit;

        return view('tenant.building.myrepairs_detail',compact('building','repair_detail','message'));
    }

    public function myrepairsUpdate(Request $request, $id)
    {
        $event = Event::find($id);
        $event->end_time = $request->end_date;
        $event->start_time = NULL;
        $event->status = $request->status_of_task;
        $event->update();
        return back();
    }

    public function myrepairsNewNote(Request $request, $id)
    {
        //  echo '<pre>';
        // print_r($request->all());exit;
        $event = Event::find($id);
        $message = Messages::where('object_id',$event->id)->first();
        $msg = new Messages();
        $msg->object_id = $id;
        $msg->parent_message_id = $message->id;
        $msg->type_id = $event->sub_type_id;
        $msg->user_id = $event->user_id;
        $msg->message = $request->reply_text;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
        return back();
    }

    public function mydeliveries()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();


        $delivery = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',38)
        ->where('apt_apply_events.status',NULL)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        $comp_delivery = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_events.sub_type_id',38)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        //  echo '<pre>';
        // print_r($delivery);exit;

        return view('tenant.building.mydeliveries',compact('building','delivery','comp_delivery'));
    }


    public function mydeliveriesDetail($id)
    {

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();

        $delivery = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->first();


        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description')
        ->get();


        //  echo '<pre>';
        // print_r($message);exit;

        return view('tenant.building.mydelivery_detail',compact('building','delivery','message'));
    }

    public function mydeliveriesUpdate(Request $request, $id)
    {
        $event = Event::find($id);
        $event->end_time = $request->end_date;
        $event->start_time = NULL;
        $event->status = $request->status_of_task;
        $event->update();
        return back();
    }

    public function mydeliveriesNewNote(Request $request, $id)
    {
        //  echo '<pre>';
        // print_r($request->all());exit;
        $event = Event::find($id);
        $msg = new Messages();
        $msg->object_id = $id;
        $msg->type_id = $event->sub_type_id;
        $msg->message = $request->reply_text;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
        return back();
    }

    public function mypickups()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();


        $pickup = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',NUll)
        ->where('apt_apply_events.sub_type_id',2007)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        $comp_pickup = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_events.sub_type_id',2007)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        //  echo '<pre>';
        // print_r($delivery);exit;

        return view('tenant.building.mypickup',compact('building','pickup','comp_pickup'));
    }


    public function mypickupsDetail($id)
    {

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();

        $pickup = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->first();


        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description')
        ->get();


        //  echo '<pre>';
        // print_r($message);exit;

        return view('tenant.building.pickup_detail',compact('building','pickup','message'));
    }

    public function mypickupsUpdate(Request $request, $id)
    {
        $event = Event::find($id);
        $event->end_time = $request->end_date;
        $event->start_time = NULL;
        $event->status = $request->status_of_task;
        $event->update();
        return back();
    }

    public function mypickupsNewNote(Request $request, $id)
    {
        //  echo '<pre>';
        // print_r($request->all());exit;
        $event = Event::find($id);
        $msg = new Messages();
        $msg->object_id = $id;
        $msg->type_id = $event->sub_type_id;
        $msg->message = $request->reply_text;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
        return back();
    }
    public function myvisitors()
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();


        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',NUll)
        ->where('apt_apply_events.sub_type_id',2006)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        $comp_visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_events.sub_type_id',2006)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->get();

        //  echo '<pre>';
        // print_r($delivery);exit;

        return view('tenant.building.myvisitor',compact('building','visitor','comp_visitor'));
    }


    public function myvisitorsDetail($id)
    {

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();

        $visitor = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->where('apt_apply_events.id',$id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description')
        ->first();


        $message = Messages::
        leftJoin('apt_apply_events', 'apt_apply_messages.object_id', '=', 'apt_apply_events.id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.object_id', $id)
        ->select('apt_apply_messages.*','apt_apply_types.description')
        ->get();


        //  echo '<pre>';
        // print_r($message);exit;

        return view('tenant.building.visitor_detail',compact('building','visitor','message'));
    }

    public function myvisitorsUpdate(Request $request, $id)
    {
        $event = Event::find($id);
        $event->end_time = $request->end_date;
        $event->start_time = NULL;
        $event->status = $request->status_of_task;
        $event->update();
        return back();
    }

    public function myvisitorsNewNote(Request $request, $id)
    {
        $message = Messages::where('object_id',$id)->first();
        //  echo '<pre>';
        // print_r($request->all());exit;
        $event = Event::find($id);
        $msg = new Messages();
        $msg->object_id = $id;
        $msg->user_id = Auth::id();
        $msg->parent_message_id = $message->id;
        $msg->type_id = $event->sub_type_id;
        $msg->message = $request->reply_text;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
        return back();
    }
}
