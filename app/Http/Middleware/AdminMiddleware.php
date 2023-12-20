<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Models\AptUsers;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $admin = AptUsers::where('user_id',Auth::id())->first();
            if($admin->is_super_admin == 1 || $admin->is_admin == 1)
            {
                return $next($request);
            }
            else
            {
               
                return redirect('/')->with('status','Access Denied! as you are not as admin');
            }

            // if(Auth::user()->role_as == '1')
            // {
            //     return $next($request);
            // }
            // else
            // {
            //     return redirect('/')->with('status','Access Denied! as you are not as admin');
            // }
        }
        else
        {
            return redirect('/')->with('status','Please Login First');
        }
    }
}
