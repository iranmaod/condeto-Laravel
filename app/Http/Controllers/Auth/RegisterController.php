<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\AptUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // echo '<pre>';
        // print_r($data);exit;
        $code = Str::random(20);
        $splitName = explode(' ', $data['name'], 2); 
        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';
        $username = preg_replace('/[^0-9a-zA-Z\-\s]/', '', $data['email']);
        $user = User::create([
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmation_code' => $code,
            'twitter_url' => 0,
            'google_url' => 0,
            'facebook_url' => 0,
            'phone' => 0,
            'company' => 0,
            'image' => 0,
            'about_me' => 0,
            'work_hours' => 0,
            'view_count' => 0,
        ]);
        
        $user_id = $user->id;
        $aptuser = new AptUsers();
        $aptuser->user_id = $user_id;
        $aptuser->save();

        return $user;
    }
}
