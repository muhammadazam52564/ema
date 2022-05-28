<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use URL;
class SuperAdminController extends Controller
{
    public function index()
    {
        return view('sadmin.dashboard');
    }
    public function branches()
    {
        $branches = User::where('role', 1)->get();
        return view('sadmin.branches', compact('branches'));
    }

    public function add_branch()
    {
        return view('sadmin.add-branch');
    }

    public function save_branch(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users|max:255',
            'password'  => 'required|min:6',
        ]);
        $branch = new User;

        $branch->name       = $request->name;
        $branch->email      = $request->email;
        $branch->password   = bcrypt($request->password);
        $branch->status     = 1;
        $branch->role       = 1;
        if($branch->save())
        {
            return redirect('/sadmin/branches')->with('msg', 'Branch Added Successfully');        
        }
    }

    public function block_branch($id, $status)
    {
        $branch = User::find($id);
        $branch->status = $status;
        if($branch->save())
        {
            if ($branch->status == 1) {
                return Redirect::back()->with('msg', 'Unblock Successfully');
            }
            return Redirect::back()->with('msg', 'Blocked Successfully');
        }
    }

    public function change_password(Request $request)
    {
        return view('sadmin.changePassword');
    }
    
    public function update_password(Request $request)
    {
            if (Hash::check($request->curr__password, Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->new__password);
                if($user->save())
                {
                    return Redirect::back()->with('msg', 'Password updated Successfully');
                }
    
    
            }
        }
        public function change_email(Request $request)
        {
            return view('sadmin.changeEmail');
        }
    
        public function update_email(Request $request)
        {
            if (Hash::check($request->password, Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->email = $request->email;
                if($user->save())
                {
                    return Redirect::back()->with('msg', 'Email updated Successfully');
                }
    
    
            }
        }
}
