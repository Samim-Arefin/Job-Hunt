<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserBookmark;
use App\Models\UserApplication;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $total_applied_jobs=0;
        $total_rejected_jobs=0;
        $total_approved_jobs=0;

        $total_applied_jobs = UserApplication::where('user_id',Auth::guard('user')->user()->id)->where('status','Applied')->count();

        $total_rejected_jobs = UserApplication::where('user_id',Auth::guard('user')->user()->id)->where('status','Rejected')->count();

        $total_approved_jobs = UserApplication::where('user_id',Auth::guard('user')->user()->id)->where('status','Approved')->count();

        return view('client.user.dashboard',compact('total_applied_jobs','total_rejected_jobs','total_approved_jobs'));
    }

    public function edit_profile()
    {
        return view('client.user.edit_profile');
    }

    public function edit_profile_update(Request $request)
    {
        $user = Auth::guard('user')->user();
        
        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(Auth::guard('user')->user()->photo != '') {
                unlink(public_path('uploads/'.$user->photo));
            }            

            $ext = $request->file('photo')->extension();
            $file_name = 'user_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$file_name);

            $user->photo = $file_name;
        }

        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;
        $user->dob = $request->dob;
        $user->update();

        return redirect()->back()->with('success', 'Profile is updated successfully!!');
    }

    public function edit_password()
    {
          return view('client.user.edit_password');
    }

    public function edit_password_update(Request $request)
    {
        $user = Auth::guard('user')->user();

        if($request->password != '') 
        {
            $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);

            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->back()->with('success', 'Password updated successfully!!');
        }

         return redirect()->back()->with('success', 'Password updated successfully!!');
    }
}
