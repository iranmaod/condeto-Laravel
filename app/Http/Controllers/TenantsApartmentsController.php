<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\Event;
use App\Models\Applications;
use App\Models\ApplyFacilities;
use App\Models\Payments;
use App\Models\Messages;
use App\Models\ApplicationFiles;
use Auth;
use Carbon\Carbon;
use App\Models\UserPropertyRelation;
use Illuminate\Http\Request;

class TenantsApartmentsController extends Controller
{
    public function apply()
    {
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();

        $payment = Payments::where('user_id',Auth::id())->where('object_id',$apartment->id)->latest()->first();
        $all_apartments = Property::where('type_id',30)
        ->where('listing_id','!=',NULL)
        ->where('brokerage_id',5065)
        ->leftJoin('listings', 'apt_apply_property.listing_id', '=', 'listings.id')
        ->select('apt_apply_property.*', 'listings.address')
        ->get();

        //  echo '<pre>';
        // print_r($all_apartments);exit;
        return view('tenant.apartment.list',compact('building','all_apartments','payment'));
    }

    public function showApartments(Request $request)
    {
        // $all_apartments = Property::where('type_id',30)
        // ->where('listing_id','!=',NULL)
        // ->where('brokerage_id',5065)
        // ->leftJoin('listings', 'apt_apply_property.listing_id', '=', 'listings.id')
        // ->get();

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        

        $all_apartments = Property::query()
            ->where('type_id',30)
            ->where('listing_id','!=',NULL)
            ->where('brokerage_id',5065)
            ->leftJoin('listings', 'apt_apply_property.listing_id', '=', 'listings.id')
            ->where('name', 'LIKE', "%{$request->search}%") 
            ->orWhere('address', 'LIKE', "%{$request->search}%") 
            ->get();

            // echo '<pre>';
            // print_r($all_apartments);exit;


            return view('tenant.apartment.list',compact('building','all_apartments'));
    }

    public function newApartments(Request $request)
    {

        
        // echo '<pre>';
        // print_r($request->all());exit;


        $move_in_date = Carbon::createFromDate($request->move_in_date_year, $request->move_in_date_month, $request->move_in_date_day);
        $move_out_date = Carbon::createFromDate($request->move_out_date_year, $request->move_out_date_month, $request->move_out_date_day);
        $previous_move_in_date = Carbon::createFromDate($request->previous_move_in_date_year, $request->previous_move_in_date_month, $request->previous_move_in_date_day);
        $previous_move_out_date = Carbon::createFromDate($request->previous_move_out_date_year, $request->previous_move_out_date_month, $request->previous_move_out_date_day);


        $application = new Applications();
        $application->property_id  = $request->apartment_id;
        $application->user_id   = Auth::user()->id;
        $application->applicant_type  = $request->applicant_type;
        $application->how_hear_about_us  = $request->how_hear_about_us;
        $application->guarantoring_for  = 1;
        $application->first_name   = $request->first_name;
        $application->last_name   = $request->last_name;
        $application->suffix  = $request->suffix;
        $application->middle_initial  = $request->middle_initial;
        $application->form_of_id  = $request->form_of_id;
        $application->id_number  = $request->id_number;
        $application->date_of_birth  = $request->date_of_birth;
        $application->phone  = $request->phone;
        $application->alternative_phone  = $request->alternative_phone;
        $application->email_address   = $request->email_address;
        $application->country   = $request->country;
        $application->street_address   = $request->street_address;
        $application->city   = $request->city;
        $application->state   = $request->state;
        $application->zip   = $request->zip;
        $application->landlord_name   = $request->landlord_name;
        $application->landlord_phone   = $request->landlord_phone;
        $application->landlord_email   = $request->landlord_email;
        $application->rent   = $request->rent;
        $application->rent_period   = $request->rent_period;
        $application->previous_rent_period   = $request->previous_rent_period;
        $application->bank_address   = $request->bank_address;
        $application->bank_account_balance   = $request->bank_account_balance;
        $application->additional_assets_income   = $request->additional_assets_income;
        $application->accountants_name   = $request->accountants_name;
        $application->accountants_phone   = $request->accountants_phone;
        $application->attorneys_name   = $request->attorneys_name;
        $application->attorneys_phone   = $request->attorneys_phone;
        $application->employment_status   = $request->employment_status;
        $application->landlord_fax   = $request->landlord_fax;
        $application->move_in_date   = $move_in_date;
        $application->move_out_date   = $move_out_date;
        $application->reason_for_leaving   = $request->reason_for_leaving;
        $application->will_keep_this_residence   = $request->will_keep_this_residence;
        $application->previous_street   = $request->previous_street;
        $application->previous_city   = $request->previous_city;
        $application->previous_state   = $request->previous_state;
        $application->previous_country   = $request->previous_country;
        $application->previous_zip   = $request->previous_zip;
        $application->previous_landlord_name   = $request->previous_landlord_name;
        $application->previous_landlord_phone   = $request->previous_landlord_phone;
        $application->previous_landlord_fax   = $request->previous_landlord_fax;
        $application->previous_monthly_rent   = $request->previous_monthly_rent;
        $application->previous_move_in_date   = $previous_move_in_date;
        $application->previous_move_out_date   = $previous_move_out_date;
        $application->previous_reason_for_leaving   = $request->previous_reason_for_leaving;
        $application->ip_address   = $request->ip_address;
        $application->reference   = 'test1234567890';
        $application->lease_term   = $request->lease_term;
        $application->payment_reference   = 'test';
        // $application->payment_amount   = 21;
        // $application->agent_fee   = $request->agent_fee;
        // $application->application_fee   = $request->application_fee;
        $application->former_employer_name   = $request->former_employer_name;
        $application->former_employer_phone   = $request->former_employer_phone;
        $application->former_employment_length   = $request->former_employment_length;
        $application->former_employer_address   = $request->former_employer_address;
        $application->employer_name   = $request->employer_name;
        $application->employer_phone   = $request->employer_phone;
        $application->employment_length   = $request->employment_length;
        $application->employer_address   = $request->employer_address;
        $application->occupation   = $request->occupation;
        $application->employer_type_of_business   = $request->employer_type_of_business;
        // $application->savings_bank_account_balance   = $request->savings_bank_account_balance;
        $application->bank_account_number   = $request->bank_account_number;
        $application->savings_bank_account_number   = $request->savings_bank_account_number;
        $application->personal_reference_name   = $request->personal_reference_name;
        $application->personal_reference_phone   = $request->personal_reference_phone;
        $application->personal_reference_address   = $request->personal_reference_address;
        $application->co_tennants   = $request->co_tennants;
        $application->phone_type   = $request->phone_type;
        $application->alternative_phone_type   = $request->alternative_phone_type;
        $application->issuing_state   = $request->issuing_state;
        $application->tenancy_type   = $request->tenancy_type;
        // $application->background_check_order_id   = $request->background_check_order_id;
        $application->background_result   = 'test';
        $application->credit_result   = 'eyJpdiI6IklKUzZRbVwvRXFvcmVkT1lsUjh0Z2dBPT0iLCJ2YWx1ZSI6IjhrRW9halRFVDZlOHYydjJ3T2FyZm8wa09BOWVsQzVCUVVhYUV5TG5HOUI5d0lOa0JcL2ZwRThCZzJsWE5cL1pSY0YxMUxzcExzRUlkV3VQSHdvZFdFTlB1YkV6VkZrdnNRYm9Telk4a1p2djRVVzRCWUdGdkZsYVVSUEhsY1ZtRWNqXC92K01DTlhFRVVIT2lLa0lyYWRiOTJUanZSUnd5cDdyRnUzdTl4bzlqXC85M1Brd0dRV25leU5SclwvVnFWUTB4XC8zQ2dXbEFPSTVCenoyaXhoaDFyRm01S1Fqdk9PSGhaN0FETnp0T1Y2MXRSamcxelVaV2RVZHZnSmlEdFNRM2k4K2Iyb29NWTE0ZExZQW5lWkFhZXJpZ1ByTE1zemtmb2ZMZGV1Q2xmVFJCMEg3U2VGMzcwK0dVcFc5VksxK0M2K2JVOE9CUXBzUmZTbE1Xc0g5V0RCaUlaTE1YUFhuNnVOVmtPam5cL0tVZnByUW45ZkVsU3k5VkUyQTZyMEtWMHZXRDBlVDFMb0ZaYXI1ZlkrT2RpQXdZN3pHcXRNM3hJNldPeEplWit3bTh4VXN6Q2d5Tk1TenJDd3doTHJwSlZJIiwibWFjIjoiNzFhZGZiODhjODZiNzVlNTk1MTIzNTBmOWM2YTViYTBiMDkyMTlkNTA3N2FkMDM2OTM1YzZmZjY4Mjc3ZGI3ZSJ9';
        $application->still_live_here   = $request->still_live_here;
        $application->payment_type   = $request->payment_type;
        $application->application_status   = 'New';
        // $application->esign_agreement_id   = $request->esign_agreement_id;
        // $application->esign_agreement_status   = $request->esign_agreement_status;
        // $application->esign_agreement_url   = $request->esign_agreement_url;
        // $application->iacceptchecks   = $request->iacceptchecks;
        $application->credit_score   = 0;
        $application->has_pets   = $request->has_pets;
        // $application->what_pets   = $request->what_pets;
        $application->pet_details   = $request->pet_details;
        $application->ip_address   = $request->ip(); 
        $application->save();

        $app_files = new ApplicationFiles();
        $app_files->application_id  = $application->id;
 
        if ($request->hasfile('apt_files')) {
            foreach ($request->file('apt_files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('apt_apply_assets'), $name);
                $data[] = $name;
            }
            
        }
        $app_files->document_path = json_encode($data);
        $app_files->save();
         


        return back();

    }

    public function myfacility()
    {
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        

    
            // echo '<pre>';
            // print_r($all_apartments);exit;


        return view('tenant.facility.index',compact('building'));
    }

    public function myfacilityBook(Request $request)
    {
        //  echo '<pre>';
        // print_r($request->all());exit;

        $date = $request->year . "-" . str_pad($request->month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($request->day, 2, "0", STR_PAD_LEFT);
        $start_time = date('Y-m-d H:i:s', strtotime("$date $request->from"));
        $end_time = date('Y-m-d H:i:s', strtotime("$date $request->to"));


        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $payment = Payments::where('user_id',Auth::id())->where('object_id',$apartment->id)->latest()->first();

        // echo '<pre>';
        // print_r($start_time);exit;

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();    
        $event = new Event();    
        $event->type_id   = $request->facility;    
        $event->sub_type_id   = 6;    
        $event->object_id  = $building->id;    
        $event->user_id  = Auth::user()->id;    
        $event->start_time   = $start_time;    
        $event->end_time   = $end_time;    
        $event->create_time   = date('Y-m-d H:i:s');   
        $event->update_time   = date('Y-m-d H:i:s');


       




        If($request->facility == 3)
        {
            $event->status = 1;
            $event->save();


            return back(); 
        }
        elseif($request->facility == 1)
        {
           
            $price = 5.00;
            $event->status = 0;
            $event->save();
            $facility = ApplyFacilities::where('id',$request->facility)->first();

            $msg = new Messages();
            $msg->type_id = $request->facility;
            $msg->object_id  = $event->id;
            $msg->user_id   = Auth::user()->id;
            $msg->title   = 'Facility Booking';
            $msg->message   = 'Your reservation for the ' .$facility->name.' on ' .$request->date.' from '.date('F d, Y h:i a',strtotime( $request->from)).' to '.date('F d, Y h:i a',strtotime( $request->to)).' is confirmed. Please observe all rules and protocols when using the facility';
            $msg->create_time  = date('Y-m-d H:i:s');
            $msg->save();
            $event_id = $event->id;
            return redirect()->route('facility.payment.view', [$payment->reference,$price,$event_id]);
        //     echo '<pre>';
        // print_r($payment);exit;
        }
        elseif($request->facility == 2)
        {
            $price = 15.00;
            $event->status = 0;
            $event->save();
            $facility = ApplyFacilities::where('id',$request->facility)->first();

            $msg = new Messages();
            $msg->type_id = $request->facility;
            $msg->object_id  = $event->id;
            $msg->user_id   = Auth::user()->id;
            $msg->title   = 'Facility Booking';
            $msg->message   = 'Your reservation for the' .$facility->name.' on ' .$request->date.' from '.date('F d, Y h:i a',strtotime( $request->from)).' to '.date('F d, Y h:i a',strtotime( $request->from)).' is confirmed. Please observe all rules and protocols when using the facility';
            $msg->create_time  = date('Y-m-d H:i:s');
            $msg->save();
            $event_id = $event->id;
            return redirect()->route('facility.payment.view', [$payment->reference,$price,$event_id]);
        }
          
    }

    public function myfacilityview()
    {

        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();



        $facility = Event::
        // where('object_id',$apartment->id)
        // where('user_id',Auth::user()->id)
        leftJoin('apt_apply_messages', 'apt_apply_events.id', '=', 'apt_apply_messages.object_id')
        ->leftJoin('apt_apply_types', 'apt_apply_events.sub_type_id', '=', 'apt_apply_types.id')
        ->leftJoin('apt_apply_facilities', 'apt_apply_events.type_id', '=', 'apt_apply_facilities.id')
        ->where('apt_apply_events.object_id',$apartment->id)
        ->where('apt_apply_events.sub_type_id',8)
        ->where('apt_apply_events.status',1)
        ->where('apt_apply_events.user_id',Auth::user()->id)
        ->select('apt_apply_events.*','apt_apply_messages.message','apt_apply_types.description','apt_apply_facilities.name as f_name')
        ->get();


        // echo '<pre>';
        // print_r($facility);exit;
        return view('tenant.facility.view',compact('building','facility'));
    }


    public function paymentApplication($reference, $price, $id)
    {
        
        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();


        $user_building =  UserPropertyRelation::where('user_id',Auth::id())->latest()->first();
        $apartment =  Property::where('id',$user_building->property_id)->first();
        $building =  Property::where('id',$apartment->parent_property_id)->first();
        $payment = Payments::where('user_id',Auth::id())->where('reference',$reference)->latest()->first();
      
      $application_price = $price;
      $application_id = $id;
        // echo '<pre>';
        // print_r($event_id);exit;
        return  view('tenant.payment.applicationview',compact('building','payment','application_price','application_id'));
    }
}
