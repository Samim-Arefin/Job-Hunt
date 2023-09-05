<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;
use App\Models\Location;
use App\Models\JobCategory;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\PageTermItem;
use App\Models\PagePrivacyItem;
use App\Models\Package;
use App\Models\Job;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::first();
        $job_locations = Location::orderBy('name', 'asc')->get();
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count','desc')->take(9)->get();
        $why_choose_items = WhyChooseItem::all();
        $testimonials = Testimonial::all();
        $featured_jobs = Job::with('rCompany','rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->orderBy('id','desc')->where('is_featured',1)->get();

        return view('client.home', compact('page_home_data', 'job_locations', 'job_categories', 'why_choose_items', 'testimonials','featured_jobs'));
    }
    
    public function job_categories()
    {
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count','desc')->get();
        
        return view('client.job_categories', compact('job_categories'));
    }

    public function terms()
    {
        $page_term_data = PageTermItem::first();
        return view('client.terms', compact('page_term_data'));
    }

    public function privacy()
    {
        $page_privacy_data = PagePrivacyItem::first();
        return view('client.privacy', compact('page_privacy_data'));
    }

    public function pricing()
    {
          $packages = Package::all();

          return view('client.pricing', compact('packages'));
    }

    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
    
        if(!$validator->passes()) 
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        } 
        else
        {
            $check = Subscriber::where('email',$request->email)->where('status',1)->count();
            if($check>0) 
            {
                return response()->json(['code'=>2,'error_message_2'=>(array)'Subscriber already exists!']);
            }
            else 
            {
                $token = hash('sha256', time());
                $obj = new Subscriber();
                $obj->email = $request->email;
                $obj->token = $token;
                $obj->status = 0;
                $obj->save();
        
                $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);
        
                $subject = 'Subscriber Verification';
                $message = 'Please click on the link below to confirm subscription:<br>';
                $message .= '<a href="'.$verification_link.'">';
                $message .= $verification_link;
                $message .= '</a>';
        
                Mail::to($request->email)->send(new AuthEmail($subject,$message));
        
                return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
            }
        }
    }
    
    public function verify($email,$token)
    {
        $subscriber_data = Subscriber::where('email',$email)->where('token',$token)->first();
    
        if($subscriber_data) 
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            return redirect()->route('home')->with('success', 'Your subscription is verified successfully!');
        }
        else 
        {
            return redirect()->route('home');
        }
    }
}
