<?php

namespace App\Http\Controllers;
Use App\Models\Payments;
use App\Models\Property;
use App\Models\Event;
use App\Models\UserPropertyRelation;
use Auth;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentsExport;
use App\Exports\RevenueExport;
use Session;
use Stripe;
class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payments::leftJoin('apt_apply_property', 'apt_apply_payments.object_id', '=', 'apt_apply_property.id')
        ->select('apt_apply_payments.*','apt_apply_property.name','apt_apply_property.fee')
        ->paginate(15);
        return view('admin.payment.index',compact('payment'));
    }
    public function export()
    {
        return Excel::download(new PaymentsExport, 'payments.csv');
    }

    public function search(Request $request)
    {
        $payment = Payments::leftJoin('apt_apply_property', 'apt_apply_payments.object_id', '=', 'apt_apply_property.id')
        ->select('apt_apply_payments.*','apt_apply_property.name','apt_apply_property.fee')
        ->where('name', 'LIKE', "%{$request->search_text}%")
        ->orWhere('reference', 'LIKE', "%{$request->search_text}%")
        ->orWhere('amount', 'LIKE', "%{$request->search_text}%")
        ->orWhere('amount_paid', 'LIKE', "%{$request->search_text}%")
        ->orWhere('date_paid', 'LIKE', "%{$request->search_text}%")
        ->orWhere('fee', 'LIKE', "%{$request->search_text}%")
        ->orderBy($request->sortby, $request->sort)->paginate(15);
        return  view('admin.payment.search',compact('payment'));
    }

    public function getPaymentScreen($reference)
    {
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $payment = Payments::where('user_id',Auth::id())->where('reference',$reference)->latest()->first();
        // echo '<pre>';
        // print_r($payment);exit;
        return  view('tenant.payment.view',compact('building','payment'));
    }
    public function getFacilityPaymentScreen($reference, $price, $event_id)
    {
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $payment = Payments::where('user_id',Auth::id())->where('reference',$reference)->latest()->first();
        $facility_price = $price;
        $event_id = $event_id;
        
        // echo '<pre>';
        // print_r($event_id);exit;
        return  view('tenant.payment.facilityview',compact('building','payment','facility_price','event_id'));
    }
    public function getPaymentSuccess(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $user = Auth::user();   
 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "receipt_email" => $user->email,
                "amount" => $request->rent_payment_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        // $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)
        // ->update([
        //     'amount_paid' => $request->rent_payment_amount
        //  ]);
        $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)->first();
        $payment->amount_paid = $payment->amount_paid + $request->rent_payment_amount;
        $payment->update();
       
        Session::flash('success', 'Payment successful!');

        
              
        return back();
    }


    public function getPaymentSuccessApplication(Request $request, $id)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $user = Auth::user();   
 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "receipt_email" => $user->email,
                "amount" => $request->rent_payment_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        // $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)
        // ->update([
        //     'amount_paid' => $request->rent_payment_amount
        //  ]);
        $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)->first();
        $payment->amount_paid = $payment->amount_paid + $request->rent_payment_amount;
        $payment->update();
       
        Session::flash('success', 'Payment successful!');

        
              
        return back();
    }


    public function getFacilityPaymentSuccess(Request $request)
    {
        // echo '<pre>';
        // print_r($request->event_id);exit;
        $user = Auth::user();   
 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "receipt_email" => $user->email,
                "amount" => $request->rent_payment_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        // $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)
        // ->update([
        //     'amount_paid' => $request->rent_payment_amount
        //  ]);
        $payment = Payments::where('user_id',Auth::id())->where('reference',$request->reference)->first();
        $payment->amount_paid = $payment->amount_paid + $request->rent_payment_amount;
        $payment->update();
       
        Session::flash('success', 'Payment successful!');
        
        $event = Event::find($request->event_id);
        $event->status = 1;
        $event->update();
        
       
        // $event = Event::where('id',$event_id)
        // ->update([
        //     'status' => 1
        //  ]);
        //   echo '<pre>';
        // print_r($event);exit;
              
        return redirect()->route('dashboard');
    }


    public function revenue()
    {
        
        $building  = Property::all();
        // $revenue = Payments::where('status','PAID')
        // // ->select(DB::raw('sum(amount_paid) as payment_amount'), DB::raw('sum(condeto_fee) as condeto_fee'))
        // ->leftJoin('users','apt_apply_payments.user_id','=','users.id')
        // ->leftJoin('apt_apply_property','apt_apply_payments.object_id','=','apt_apply_property.id')
        // // ->leftJoin(DB::raw('apt_apply_property app_building'),DB::raw('app_building.id'),'=','apt_apply_property.parent_property_id')
      
        // ->get();
        $revenue = Payments::where('status','PAID')
        ->select('apt_apply_payments.amount_paid','apt_apply_payments.condeto_fee','apt_apply_property.name as building_name')
        ->leftJoin('users','apt_apply_payments.user_id','=','users.id')
        ->leftJoin('apt_apply_property','apt_apply_payments.object_id','=','apt_apply_property.id')
        // ->leftJoin(DB::raw('apt_apply_property app_building'),DB::raw('app_building.id'),'=','apt_apply_property.parent_property_id')
      
        ->paginate(15);

       
        // foreach($revenue as $item)
        // {
        //     if($item->object_id == $item->object_id)
        //     {
        //         echo '<pre>';
        //         print_r($item);exit;
        //     }
        // }
        // echo '<pre>';
        // print_r($revenue);exit;
        
       
        return view('admin.payment.revenue',compact('building','revenue'));
    }

    public function revenueexport()
    {
        return Excel::download(new RevenueExport, 'revenue.csv');
    }
    public function revenueFilter(Request $request)
    {
        $building  = Property::all();
        $revenue = Payments::
        where('status','PAID')
        ->select('apt_apply_payments.amount_paid','apt_apply_payments.condeto_fee','apt_apply_property.name as building_name')
        ->leftJoin('users','apt_apply_payments.user_id','=','users.id')
        ->leftJoin('apt_apply_property','apt_apply_payments.object_id','=','apt_apply_property.id')
        ->where('apt_apply_property.name', 'LIKE', "%{$request->property}%")
        ->paginate(15);
        return view('admin.payment.revenue',compact('building','revenue'));
    }
}
