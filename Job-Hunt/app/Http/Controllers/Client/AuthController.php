<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
use App\Models\User;
use App\Models\Company;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function user_signup()
    {
        return view('client.user.auth.signup');
    }

    public function user_signup_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        
        $user = User::where('email', $request->email)->first();
        if(($user != null) && ($user->email == $request->email))
        {
           return redirect()->back()->with('error', 'Email already exists!!');
        }

        $token = hash('sha256',time());

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $token;
        $user->status = 0;
        $user->save();

        $verification_link = url('auth/user/registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'For registration: <br><a href="'.$verification_link.'">Click here</a>';

        Mail::to($request->email)->send(new AuthEmail($subject, $message));

        $email = $request->email;

        return view('email.view', compact('email', 'subject'));
    }
    
    public function user_registration_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        
        if(!$user)
        {
           return redirect()->route('auth.user-login');
        }

        $user->status = 1;
        $user->token = '';
        $user->update();

        return redirect()->route('auth.user-login')->with('success','Email verified sucessfully');
    }

    public function user_login()
    {
        return view('client.user.auth.login');
    }
    
    public function user_login_submit(Request $request)
    {
        $validated = $request->validate([
          'email' => 'required|email',
          'password' => 'required',

        ]);

        $credentials = [
              'email' => $request->email,
              'password' => $request->password,
              'status' => 1
        ];
        if(Auth::guard('user')->attempt($credentials)){
              return redirect()->route('user.dashboard');
        }
        else
        {
            $user = User::where('email', $request->email)->first();

            if(!$user){
                return redirect()->route('auth.user-login')->with('error', 'Invalid Email');
            }
            else if($user->status != 1)
            {
                return redirect()->route('auth.user-login')->with('error', 'Please Verify your Email');
            }
            else
            {
                return redirect()->route('auth.user-login')->with('error', 'Invalid Password');
            }
        }
    }


    public function user_forget_password()
    {
        return view('client.user.auth.forget_password');
    }

    public function user_forget_password_submit(Request $request)
    {
        $validated = $request->validate([
        'email' => 'required|email',
        ]);

        $token = hash('sha256', time());
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect()->back()->with('error','Email not found!!');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('auth/user/reset-password/'.$token.'/'.$request->email);

        $subject ='Reset Password';

        $message = 'In order to change password: <br> <a href="'.$reset_link.'">Click Here</a>';

        Mail::to($request->email)->send(new AuthEmail($subject, $message));

        $email = $request->email;

        return view('email.view', compact('email', 'subject'));
    }
    
    public function user_reset_password($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect()->route('auth.user-login');
        }

        return view('client.user.auth.reset_password', compact('token','email'));
    }

    public function user_reset_password_submit(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        if(!$user)
        {
           return redirect()->route('auth.user-login');
        }
        $user->token = '';
        $user->password = Hash::make($request->password);

        $user->update();
        return redirect()->route('auth.user-login')->with('success','Password updated sucessfully');;
    }

    public function user_logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('auth.user-login');
    }

    // Company Section
    public function company_signup()
    {
        return view('client.company.auth.signup');
    }   

    public function company_signup_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        
        $company = Company::where('email', $request->email)->first();
        if(($company != null) && ($company->email == $request->email))
        {
           return redirect()->back()->with('error', 'Email already exists!!');
        }

        $token = hash('sha256',time());

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = Hash::make($request->password);
        $company->token = $token;
        $company->status = 0;
        $company->save();

        $verification_link = url('auth/company/registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'For registration: <br><a href="'.$verification_link.'">Click here</a>';

        Mail::to($request->email)->send(new AuthEmail($subject, $message));

        $email = $request->email;

        return view('email.view', compact('email', 'subject'));
    }
    
    public function company_registration_verify($token, $email)
    {
        $company = Company::where('token', $token)->where('email', $email)->first();
        
        if(!$company)
        {
           return redirect()->route('auth.company-login');
        }

        $company->status = 1;
        $company->token = '';
        $company->update();

        return redirect()->route('auth.company-login')->with('success','Email verified sucessfully');
    }

    public function company_login()
    {
        return view('client.company.auth.login');
    }

    public function company_login_submit(Request $request)
    {
        $validated = $request->validate([
          'email' => 'required|email',
          'password' => 'required',

        ]);

        $credentials = [
              'email' => $request->email,
              'password' => $request->password,
              'status' => 1
        ];
        if(Auth::guard('company')->attempt($credentials)){
              return redirect()->route('company.dashboard');
        }
        else
        {
            $company = Company::where('email', $request->email)->first();

            if(!$company){
                return redirect()->route('auth.company-login')->with('error', 'Invalid Email');
            }
            else if($company->status != 1)
            {
                return redirect()->route('auth.company-login')->with('error', 'Please Verify your Email');
            }
            else
            {
                return redirect()->route('auth.company-login')->with('error', 'Invalid Password');
            }
        }
    }

    public function company_forget_password()
    {
        return view('client.company.auth.forget_password');
    }

    public function company_forget_password_submit(Request $request)
    {
        $validated = $request->validate([
        'email' => 'required|email',
        ]);

        $token = hash('sha256', time());
        $company = Company::where('email', $request->email)->first();

        if(!$company){
            return redirect()->back()->with('error','Email not found!!');
        }

        $company->token = $token;
        $company->update();

        $reset_link = url('auth/company/reset-password/'.$token.'/'.$request->email);

        $subject ='Reset Password';

        $message = 'In order to change password: <br> <a href="'.$reset_link.'">Click Here</a>';

        Mail::to($request->email)->send(new AuthEmail($subject, $message));

        $email = $request->email;

        return view('email.view', compact('email', 'subject'));
    }
    
    public function company_reset_password($token, $email)
    {
        $company = Company::where('token', $token)->where('email', $email)->first();
        if(!$company){
            return redirect()->route('auth.company-login');
        }

        return view('client.company.auth.reset_password', compact('token','email'));
    }

    public function company_reset_password_submit(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $company = Company::where('token', $request->token)->where('email', $request->email)->first();
        if(!$company)
        {
           return redirect()->route('auth.company-login');
        }
        $company->token = '';
        $company->password = Hash::make($request->password);

        $company->update();
        return redirect()->route('auth.company-login')->with('success','Password updated sucessfully');;
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('auth.company-login');
    }
}
