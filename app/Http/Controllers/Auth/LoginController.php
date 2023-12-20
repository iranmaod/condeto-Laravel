<?php

namespace App\Http\Controllers\Auth;
use App\Models\AptUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {

        $admin = AptUsers::where('user_id',Auth::id())->first();
        // echo '<pre>';
        // print_r($admin->is_super_admin);exit;
        if($admin->is_super_admin == 1)
        {
            return '/condeto_admin';
        }
        elseif($admin->is_super_admin == 0)
        {
            return '/dashboard';
        }

        // if(Auth::user()->role_as == '1') //1 = Admin Login
        // {
            
        // }
        // elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        // {
        //     
        // }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
