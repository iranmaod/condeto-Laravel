<?php

namespace App\Http\Controllers;
use App\Models\Messages;
use App\Models\Types;
use App\Models\Property;
use App\Models\AptUsers;
use App\Models\UserPropertyRelation;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MessagesExport;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $message = Messages::where('type_id',4)->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.first_name','apt_apply_types.description')
        ->paginate(10);

// exit;

        // $message = Messages::leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        // ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        // ->select('apt_apply_messages.*','users.name','apt_apply_types.description')
        // ->paginate(10);
        return view('admin.message.index',compact('message'));
    }

    public function search(Request $request)
    {
        $message = Messages::where('type_id',4)->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->select('apt_apply_messages.*','users.first_name','users.last_name','apt_apply_types.description')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('message', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.message.search',compact('message'));
    }

    public function view_usermsg()
    {
        $admin = AptUsers::where('user_id',Auth::id())->first();


        if($admin->is_super_admin == 1 || $admin->is_admin == 1)
        {
            
        $property = Property::where('parent_property_id',40)->get();
        // $message = Messages::where('user_id',Auth::id())->where('type_id',4)->leftJoin('users', 'apt_apply_messages.object_id', '=', 'users.id')
        // ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        // ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name',)
        // ->get();
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
        // print_r($message);exit;

        return view('front.message.index',compact('message','property'));
        }
        elseif($admin->is_admin == 0)
        {

            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
            $apartment =  Property::where('id',$user_building->property_id)->first();
            $building =  Property::where('id',$apartment->parent_property_id)->first();
            $property = Property::where('parent_property_id',40)->get();
            // $message = Messages::
            // where('parent_message_id',NULL)
            // ->where('message',!NULL)
            // ->where('user_id',Auth::id())
            // ->orwhere('object_id',Auth::id())
            
            // // ->leftJoin('users', 'apt_apply_messages.object_id', '=', 'users.id')
            // // ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
            // // ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
            // // ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name',)
            // ->orderBy('id','DESC')->get();
            $message = Messages::
            where('parent_message_id',NULL)
            ->whereNotNull('message')
            ->where(function ($query) {
                $query->where('user_id', '=', Auth::id())
                      ->orWhere('object_id', '=', Auth::id());
            })
            
            
            // ->leftJoin('users', 'apt_apply_messages.object_id', '=', 'users.id')
            ->leftJoin('users', 'apt_apply_messages.user_id', '=', 'users.id')
            ->leftJoin('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
            ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name',)
            ->orderBy('id','DESC')->get();
            
            // echo '<pre>';
            // print_r($message);exit;
    
            return view('tenant.message.index',compact('message','building'));
        }
    }

    public function export_msg() 
    {
        return Excel::download(new MessagesExport, 'messages.csv');
    }
    public function msgDetail($id) 
    {

        $admin = AptUsers::where('user_id',Auth::id())->first();
        $property = Property::where('parent_property_id',40)->get();

        if($admin->is_super_admin == 1 || $admin->is_admin == 1)
        {
            $message = Messages::
        join('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->join('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.id',$id)
        ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->first();

        $all_message = Messages::where('parent_message_id',$message->id)
        ->join('users', 'apt_apply_messages.user_id', '=', 'users.id')
        // ->where('apt_apply_messages.id',$id)
        ->select('apt_apply_messages.*','users.first_name','users.last_name','users.image')
        ->get();


    //      echo '<pre>';
    //  print_r($all_message);exit;


        return view('front.message.detail',compact('message','property','all_message'));
        
        }
        elseif($admin->is_admin == 0)
        {
            $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
            $apartment =  Property::where('id',$user_building->property_id)->first();
            $building =  Property::where('id',$apartment->parent_property_id)->first();


        $message = Messages::
        join('users', 'apt_apply_messages.user_id', '=', 'users.id')
        ->join('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        ->where('apt_apply_messages.id',$id)
        ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name','users.image')
        ->first();

        // $message = Messages::
        // join('users', 'apt_apply_messages.object_id', '=', 'users.id')
        // ->where(function ($query) {
        //     $query->where('user_id', '=', Auth::id())
        //           ->orWhere('object_id', '=', Auth::id());
        // })
        
        // ->join('apt_apply_types', 'apt_apply_messages.type_id', '=', 'apt_apply_types.id')
        // ->where('apt_apply_messages.id',$id)
        // ->select('apt_apply_messages.*','users.username','apt_apply_types.description','users.first_name','users.last_name','users.image')
        // ->first();







        //  echo '<pre>';
        //  print_r($message);exit;

        if($message->type_id == 4)
        {

            $all_message = Messages::where('parent_message_id',$message->id)
            ->join('users', 'apt_apply_messages.user_id', '=', 'users.id')
            // ->where('apt_apply_messages.id',$id)
            ->select('apt_apply_messages.*','users.first_name','users.last_name','users.image')
            ->get();

 
        //      echo '<pre>';
        //  print_r($all_message);exit;


            return view('tenant.message.detail',compact('message','building','all_message'));
        }
        else
        {
            return view('tenant.message.detail',compact('message','building'));
        }
         
        }


        




    }

    public function msgreply(Request $request, $id)
    {
        $message = Messages::where('id',$id)->first();

        $msg = new Messages();
        $msg->type_id = 4;
        $msg->parent_message_id = $message->id;
        $msg->object_id  = $message->object_id;
        $msg->user_id   = Auth::user()->id;
        $msg->message   = $request->reply_text;
        $msg->create_time  = date('Y-m-d H:i:s');
        $msg->update_time  = date('Y-m-d H:i:s');
        $msg->save();
       


        return back();

        // echo '<pre>';
        //  print_r($message);exit;
    }


}
