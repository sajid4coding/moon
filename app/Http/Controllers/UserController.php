<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    public function customer_register()
    {
        return view('frontend.register');
    }

    public function customer_login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(User::where('email', $request->email)->exists()){
            if(User::where('email', $request->email)->first()->role == 'Customer'){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect('account');
                }else{
                    return back()->with('login error', 'Login Information Wrong');
                }
            }else{
                return back()->with('login error', 'Your are not customer');
            }
        }else{
            return back()->with('login error', $request->email." Doesn't not exists");
        }

    }
    public function customer_register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $id = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Customer',
            'status' => true,
            'created_at' => Carbon::now()
        ]);

        User::find($id)->sendEmailVerificationNotification();

        return back()->with('Registation_Success', 'Check Your Email Address and Verified Your Account');
    }




    // Vendor Registation Method Start

    public function vendor_login()
    {
        return view('frontend.vendor.login');
    }
    public function vendor_login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(User::where('email', $request->email)->exists()){
            if(User::where('email', $request->email)->first()->role == 'Vendor'){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                   if(User::where('email', $request->email)->first()->status == 1){
                        return redirect('home');
                   }else{
                        return back()->with('login error', 'Your Vendor request is under review');
                   }
                }else{
                    return back()->with('login error', 'Login Information Wrong');
                }
            }else{
                return back()->with('login error', 'Your are not vendor');
            }
        }else{
            return back()->with('login error', $request->email." Doesn't not exists");
        }

    }

    public function vendor_register()
    {
        return view('frontend.vendor.registation');
    }
    public function vendor_register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::insert(
            $request->except('_token','password','password_confirmation') + ([
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt($request->password),
            'number' => $request->number,
            'created_at' => Carbon::now(),
            'role' => 'Vendor'
        ])
        );
        return redirect(route('vendor_login'));
    }
}
