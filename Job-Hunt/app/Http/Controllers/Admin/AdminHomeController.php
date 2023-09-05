<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\PageHomeItem;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
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

    public function home_page()
    {
        $page_home_data = PageHomeItem::first();
        return view('admin.page-settings.home_page', compact('page_home_data'));
    }

    public function home_page_update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'job_title' => 'required',
            'job_category' => 'required',
            'job_location' => 'required',
            'search' => 'required',
            'job_category_heading' => 'required',
            'job_category_status' => 'required',
            'why_choose_heading' => 'required',
            'why_choose_status' => 'required',
            'featured_jobs_heading' => 'required',
            'featured_jobs_status' => 'required',
            'testimonial_status' => 'required',
        ]);
        
        $page_home_data = PageHomeItem::first();

        if($request->hasFile('background')) {
            $request->validate([
                'background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$page_home_data->background));

            $ext = $request->file('background')->extension();
            $file_name = 'banner_home'.'.'.$ext;

            $request->file('background')->move(public_path('uploads/'), $file_name);

            $page_home_data->background = $file_name;
        }

        if($request->hasFile('why_choose_background')) {
            $request->validate([
                'why_choose_background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$page_home_data->why_choose_background));

            $ext = $request->file('why_choose_background')->extension();
            $file_name = 'banner3'.'.'.$ext;

            $request->file('why_choose_background')->move(public_path('uploads/'), $file_name);

            $page_home_data->why_choose_background = $file_name;
        }

        if($request->hasFile('testimonial_background')) {
            $request->validate([
                'testimonial_background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$page_home_data->testimonial_background));

            $ext = $request->file('testimonial_background')->extension();
            $file_name = 'testimonial_banner'.'.'.$ext;

            $request->file('testimonial_background')->move(public_path('uploads/'), $file_name);

            $page_home_data->testimonial_background = $file_name;
        }

        $page_home_data->heading = $request->heading;
        $page_home_data->text = $request->text;
        $page_home_data->job_title = $request->job_title;
        $page_home_data->job_category = $request->job_category;
        $page_home_data->job_location = $request->job_location;
        $page_home_data->search = $request->search;
        $page_home_data->job_category_heading = $request->job_category_heading;
        $page_home_data->job_category_subheading = $request->job_category_subheading;
        $page_home_data->job_category_status = $request->job_category_status;

        $page_home_data->why_choose_heading = $request->why_choose_heading;
        $page_home_data->why_choose_subheading = $request->why_choose_subheading;
        $page_home_data->why_choose_status = $request->why_choose_status;

        $page_home_data->featured_jobs_heading = $request->featured_jobs_heading;
        $page_home_data->featured_jobs_subheading = $request->featured_jobs_subheading;
        $page_home_data->featured_jobs_status = $request->featured_jobs_status;

        $page_home_data->testimonial_status = $request->testimonial_status;

        $page_home_data->update();

        return redirect()->back()->with('success', 'Data updated successfully!!');
    }

    public function all_subscribers()
    {
        $subscribers = Subscriber::where('status',1)->get();
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscriber.send_email');
    }

    public function send_email_submit(Request $request) 
    {
        $request->validate([
            'subject' => 'required',
            'comment' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->comment;

        $all_subs = Subscriber::where('status',1)->get();
        foreach($all_subs as $item)
        {
            Mail::to($item->email)->send(new AuthEmail($subject,$message));
        }        

        return redirect()->route('admin.all-subscribers')->with('success','Email is sent to all subscribers');

    }

    public function delete($id)
    {
        Subscriber::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
    
}
