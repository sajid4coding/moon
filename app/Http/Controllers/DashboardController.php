<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Team,User,Category,Product};
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\NewAdminEmail;
use Laravel\Ui\Presets\React;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Vendor' && auth()->user()->status == 1){
            return view('home',[
                'users' => User::all(),
                'categories' => Category::all(),
                'products' => Product::all(),
            ]);
        }else{
            return view('frontend.account');
        }
    }

    public function add_admin(){
        return view('dashboard.user.users');
    }
    public function add_admin_post(Request $request){
        $request->validate([
            'new_admin_name' => 'required',
            'new_admin_email' => 'required|unique:App\Models\User,email'
        ]);
        $provider_name = Auth::user()->name;
        $generate_password = Str::random(5);

        User::insert([
            'name' => $request->new_admin_name,
            'email' => $request->new_admin_email,
            'email_verified_at' => Carbon::now(),
            'password' => hash::make($generate_password),
            'created_at' => Carbon::now(),
            'role' => "Admin",
        ]);

        Mail::to($request->new_admin_email)->send(new NewAdminEmail($request->new_admin_email, $provider_name, $generate_password));
        return back();
    }

    public function admin_list(){
        return view('dashboard.user.adminlist', [
            'admins' => User::all()
        ]);
    }
    public function vendor_list(){
        return view('dashboard.user.vendorlist', [
            'admins' => User::all()
        ]);
    }
    public function vendor_status($id){
        $vendor = User::find($id);

        if($vendor->status == false){
            $vendor->status = true;
        }else{
            $vendor->status = false;
        }
        $vendor->save();
        return back();
    }
}
