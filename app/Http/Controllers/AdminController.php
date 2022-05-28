<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Redirect;
use Hash;
use URL;

class AdminController extends Controller
{
    public function index()
    {
        $all        = Order::count();
        $pending    = Order::where('status', 'pending')->count();
        $ongoing    = Order::where('status', 'ongoing')->count();
        $completed  = Order::where('status', 'completed')->count();
        $canceled   = Order::where('status', 'canceled')->count();
        return view('admin.dashboard', compact('all', 'pending', 'ongoing', 'completed', 'canceled'));
    }

    public function change_password(Request $request)
    {
        return view('admin.changePassword');
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
        return view('admin.changeEmail');
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
