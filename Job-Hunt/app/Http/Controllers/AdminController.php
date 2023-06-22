<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminController extends Controller
{
     public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $validated = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            $admin = Admin::where('email', $request->email)->first();
            if(!$admin){
                return redirect()->route('admin.login')->with('message', 'Invalid Email');
            }
            else
            {
                return redirect()->route('admin.login')->with('message', 'Invalid Password');
            }
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
