<?php

namespace App\Http\Controllers;
Use App\Models\Event;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DeleveryExport;
use App\Exports\RepairExport;
use App\Exports\PickupsExport;
use App\Exports\VisitorsExport;
use App\Exports\FacilityBookingExport;
class EventController extends Controller
{
    public function delivery()
    {
        $delivery = Event::where('type_id',38)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->get();
        return  view('admin.event.delivery',compact('delivery'));
    }
    public function delivery_search(Request $request)
    {
        $delivery = Event::where('type_id',38)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('start_time', 'LIKE', "%{$request->search_text}%")
        ->orWhere('end_time', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.event.delivery_search',compact('delivery'));
    }
    public function repairs()
    {
        $delivery = Event::leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->paginate(15);
        return  view('admin.event.repairs',compact('delivery'));
    }


    public function repairs_search(Request $request)
    {
        $delivery = Event::leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('start_time', 'LIKE', "%{$request->search_text}%")
        ->orWhere('end_time', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.event.repairs_search',compact('delivery'));
    }

    public function pickups()
    {
        $delivery = Event::where('type_id',2007)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->paginate(15);
        return  view('admin.event.pickups',compact('delivery'));
    }


    public function pickups_search(Request $request)
    {
        $delivery = Event::where('type_id',2007)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('start_time', 'LIKE', "%{$request->search_text}%")
        ->orWhere('end_time', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.event.pickups_search',compact('delivery'));
    }


    public function visitors()
    {
        $delivery = Event::where('type_id',2006)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->paginate(15);
        return  view('admin.event.visitors',compact('delivery'));
    }


    public function visitors_search(Request $request)
    {
        $delivery = Event::where('type_id',2006)->leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('start_time', 'LIKE', "%{$request->search_text}%")
        ->orWhere('end_time', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.event.visitors_search',compact('delivery'));
    }

    public function facility_bookings()
    {
        $delivery = Event::leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->paginate(15);
        return  view('admin.event.facility_bookings',compact('delivery'));
    }


    public function facility_bookings_search(Request $request)
    {
        $delivery = Event::leftJoin('users', 'apt_apply_events.user_id', '=', 'users.id')
        ->select('apt_apply_events.*','users.first_name','users.last_name')
        ->where('first_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('last_name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('start_time', 'LIKE', "%{$request->search_text}%")
        ->orWhere('end_time', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.event.facility_bookings_search',compact('delivery'));
    }

    public function export_delivery()
    {
        return Excel::download(new DeleveryExport, 'delivery.csv');
    }
    public function export_repairs()
    {
        return Excel::download(new RepairExport, 'repair.csv');
    }
    public function export_pickups()
    {
        return Excel::download(new PickupsExport, 'pickup.csv');
    }
    public function export_visitors()
    {
        return Excel::download(new VisitorsExport, 'visitors.csv');
    }
    public function export_bookings()
    {
        return Excel::download(new FacilityBookingExport, 'facility_booking.csv');
    }
}
