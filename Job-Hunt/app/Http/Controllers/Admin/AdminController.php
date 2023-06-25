<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\AuthEmail;
use App\Models\Admin;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    
    public function login_submit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
              'email' => $request->email,
              'password' => $request->password,
        ];
        
        if(Auth::guard('admin')->attempt($credentials))
        {
           return redirect()->route('admin.index');
        }
        else
        {
           $admin = Admin::Where('email', $request->email)->first();

           if(!$admin)
           {
               return redirect()->back()->with('error', 'Invalid Email!!');
           }
           else
           {
               return redirect()->back()->with('error', 'Invalid Password!!');
           }
        }
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if(!$admin){
            return redirect()->back()->with('error','Email not found!!');
        }
        
        $token = hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Your Password';
        $message = 'In order to change password: <br> <a href="'.$reset_link.'">Click Here</a>';

        \Mail::to($request->email)->send(new AuthEmail($subject, $message));

        $email = $request->email;

        return view('email.view', compact('email', 'subject'));
    }

    public function reset_password ($token, $email)
    {
        $admin = Admin::where('token', $token)->where('email', $email)->first();

        if(!$admin){
            return redirect()->route('admin.login');
        }
        
        return view('admin.reset_password', compact('token','email'));
    }

    public function reset_password_submit(Request $request)
    {
        $validated = $request->validate([
              'password' => 'required',
              'confirm_password' => 'required|same:password'
        ]);

       $admin = Admin::where('token', $request->token)->where('email', $request->email)->first();
       $admin->token = '';
       $admin->password = Hash::make($request->password);

       $admin->update();
       return redirect()->route('admin.login');
    }
}
