<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Mail\AuthEmail;
use Hash;
use Auth;


class AuthController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }
    
    public function login_submit(Request $request)
    {
          $validated = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
          ]);
          
          $credentials = [
              'email' => $request->email,
              'password' => $request->password,
              'status' => 'Active'
          ];

          if(Auth::attempt($credentials)){
              return redirect()->route('authentication.dashboard');
          }else{
            $user = User::where('email', $request->email)->first();
            if(!$user){
                return redirect()->route('authentication.login')->with('message', 'Invalid Email');
            }
            else if($user->status != 'Active')
            {
                return redirect()->route('authentication.login')->with('message', 'Please Verify your Email');
            }
            else
            {
                return redirect()->route('authentication.login')->with('message', 'Invalid Password');
            }
          }
    }
    
    public function logout()
    {
         Auth::guard('web')->logout();
         return redirect()->route('authentication.login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registration_submit(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|min:3|max:25',
        'email' => 'required|email',
        'password' => 'required',
        ]);

        $token = hash('sha256',time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'For registration: <br><a href="'.$verification_link.'">Click here</a>';

        \Mail::to($request->email)->send(new AuthEmail($subject,$message));
        echo "Email Sent! Please Verify your Email"; 
    }

    public function registration_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user)
        {
           return redirect()->route('authentication.login');
        }
       
        $user->status = 'Active';
        $user->token = '';
        $user->update();

        return redirect()->route('authentication.login');
    }
    
    public function forget_password()
    {
        return view('forget_password');
    }
    
    public function forget_password_submit(Request $request)
    {
        $validated = $request->validate([
        'email' => 'required|email',
        ]);

        $token = hash('sha256', time());
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect()->back()->with('message','Email not found!!');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);

        $subject ='Reset Password';

        $message = 'In order to change password: <br> <a href="'.$reset_link.'">Click Here</a>';

        \Mail::to($request->email)->send(new AuthEmail($subject, $message));

        echo "Email Sent! Please Check your Email"; 
    }

    public function reset_password ($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect()->route('authentication.login');
        }
        
        return view('reset_password', compact('token','email'));
    }

    public function reset_password_submit(Request $request)
    {
        $validated = $request->validate([
        'password' => 'required',
        ]);

       $user = User::where('token', $request->token)->where('email', $request->email)->first();
       $user->token = '';
       $user->password = Hash::make($request->password);

       $user->update();
       return redirect()->route('authentication.login');
    }
}
