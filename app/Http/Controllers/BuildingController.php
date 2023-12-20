<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\AptUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BuildingController extends Controller
{
    public function index()
    {
        $property = Property::where('parent_property_id',40)->get();
        return view('front.building.index',compact('property'));
    }
    public function staff_add(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());exit;
        $user_type = $request->staff_role;
        $generated_password = Str::random(8);
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
        $user->phone = 0;
        $user->company = 0;
        $user->image = 0;
        $user->about_me = 0;
        $user->work_hours = 0;
        $user->view_count = 0;
        $user->phone = $request->phone_number;
        $user->password = $generated_password;
		// $user->password_confirmation = $generated_password;
        $user->save();

        $user_id = $user->id;
        $aptuser = new AptUsers();
        $aptuser->user_id = $user_id;
        $aptuser->save();
        return redirect()->route('building.index');

     
    }
}
