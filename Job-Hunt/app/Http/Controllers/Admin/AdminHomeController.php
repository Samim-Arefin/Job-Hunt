<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function edit_profile()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $admin = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);
            $admin->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$admin->photo));

            $ext = $request->file('photo')->extension();
            $file_name = 'admin'.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $file_name);

            $admin->photo = $file_name;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success', 'Profile updated successfully!!');
    }
}
