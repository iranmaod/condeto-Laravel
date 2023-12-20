<?php

namespace App\Http\Controllers;
use App\Models\Property;
Use App\Models\Payments;
use App\Models\AptUsers;
use App\Models\Messages;
use App\Models\Event;
use App\Models\User;
use App\Exports\AdminUserExport;
use App\Models\UserPropertyRelation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Str;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
     
        return view('admin.index');
    }
    public function adminUser()
    {
        // $user = AptUsers::leftJoin('users', 'apt_apply_users.user_id', '=', 'users.id')
        $user = User::leftJoin('apt_apply_users', 'users.id', '=', 'apt_apply_users.user_id')
        ->where('apt_apply_users.is_super_admin',1)
        ->select('users.*','apt_apply_users.is_super_admin')
        ->get();
        
        // echo '<pre>';
        // print_r($user);exit;
        return view('admin.user.index',compact('user'));
    }
    public function adminUserEdit($id)
    {
        $user = User::find($id);
        
        // echo '<pre>';
        // print_r($user);exit;
        return view('admin.user.edit',compact('user'));
    }
    public function adminUserCreate()
    {
        return view('admin.user.create');
    }
    public function adminUserUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
 
   
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin.users');
    }
    public function adminUserCreateNew(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
 
        
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = preg_replace('/[^0-9a-zA-Z\-\s]/', '', $request->email);
        $user->confirmation_code = $code = Str::random(20);
        $user->twitter_url = 0;
        $user->google_url = 0;
        $user->phone = 0;
        $user->facebook_url = 0;
        $user->company = 0;
        $user->image = 0;
        $user->about_me = 0;
        $user->work_hours = 0;
        $user->view_count = 0;
    
        $user->save();

    
        
        $user_id = $user->id;
        $aptuser = new AptUsers();
        $aptuser->user_id = $user_id;
        $aptuser->is_super_admin = 1;
        $aptuser->save();

            // echo '<pre>';
            // print_r($user);exit;
        return redirect()->route('admin.users');
    }

    public function adminUserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
    }

    public function adminUserExport()
    {
        return Excel::download(new AdminUserExport, 'admin_users.csv');
    }
    public function adminUserSearch(Request $request)
    {
        $user = User::query()
        ->where('email', 'LIKE', "%{$request->search_text}%") 
        ->orderBy($request->sortby, $request->sort)->get();

        return view('admin.user.index',compact('user'));

    }
}
