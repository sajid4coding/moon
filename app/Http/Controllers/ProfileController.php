<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{Team,User,Verification,Product};
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
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

    public function profile(){
        if(Verification::where('user_id', auth()->user()->id)->exists()){
            if(Verification::where('user_id', auth()->user()->id)->first()->status == 1){
                $Verification_status = true;
            }else{
                $Verification_status = false;
            }
        }else{
            $Verification_status = false;
        }
        return view('dashboard.profile.profile', compact('Verification_status'));
    }
    public function profileupload(Request $request){
        $request->validate([
            'profile_image' => 'Image',
            'cover_image' => 'Image',
        ]);

        if($request->hasFile('profile_image')){
            $new_name = auth()->user()->id.'_'.time().'.'.$request->file('profile_image')->getclientoriginalextension();
            $img = Image::make($request->file('profile_image'))->resize(300, 300);
            $img->save(base_path('public/uploads/profile_image/'.$new_name), 80);
            User::find(auth()->user()->id)->update([
                'profile_image' => $new_name
            ]);
        }

        if($request->hasFile('cover_image')){
            $new_name = auth()->user()->id.'_'.time().'.'.$request->file('cover_image')->getclientoriginalextension();
            $img = Image::make($request->file('cover_image'))->resize(1600, 451);
            $img->save(base_path('public/uploads/cover_image/'.$new_name), 80);
            User::find(auth()->user()->id)->update([
                'cover_image' => $new_name
            ]);
        }

        return back();

    }
    public function change_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8|different:current_password',
            'password_confirmation' => 'required',
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            User::find(auth()->user()->id)->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('update_success', 'Password Update Successfully');
        }else{
            return back()->withErrors("Your Current Password Does not Match!");
        }

    }
    public function phone_verification(){
        $code = rand(1111,9999);

        $url = "http://66.45.237.70/api.php";
        $number=auth()->user()->number;
        $text="Hello ".auth()->user()->name.','."Your balance is ". $code;
        $data= array(
        'username'=>"01834833973",
        'password'=>"TE47RSDM",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];


        Verification::insert([
            'user_id' => auth()->user()->id,
            'phone_number' => $number,
            'code' => $code,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('code_success', 'Send 4 Digit Code On Your Phone Number');
    }

    public function check_code(Request $request){

        if($request->code == Verification::where('user_id', auth()->user()->id)->latest()->first()->code){
            Verification::where('user_id', auth()->user()->id)->update([
                'status' => true
            ]);
            return back()->with('verificaton_success', 'Verification Successful');
        }else{
            return back()->with('code_unsuccessful', 'Wrong Digit You Put');
        }
    }
}
