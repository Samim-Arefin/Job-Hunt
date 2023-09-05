<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\UserApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
use Auth;

class ApplicationController extends Controller
{
    public function apply($id)
    {
        $existing_apply_check = UserApplication::where('user_id',Auth::guard('user')->user()->id)->where('job_id',$id)->count();
        if($existing_apply_check > 0) {
            return redirect()->back()->with('error', 'You already have applied on this job!');
        }

        $job_single = Job::where('id',$id)->first();

        return view('client.user.job_applications.apply', compact('job_single'));
    }

    public function apply_submit(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'required'
        ]);

        $obj = new UserApplication();
        $obj->user_id = Auth::guard('user')->user()->id;
        $obj->job_id = $id;
        $obj->cover_letter = $request->cover_letter;
        $obj->status = 'Applied';
        $obj->save();

        $job_info = Job::with('rCompany')->where('id',$id)->first();
        $company_email = $job_info->rCompany->email;

        $applicants_list_url = route('company.applicant',$id);
        $subject = 'A person has applied to a job';
        $message = 'Please check the application: ';
        $message .= '<a href="'.$applicants_list_url.'">Click here to see applicants list for this job</a>';

        Mail::to($company_email)->send(new AuthEmail($subject, $message));

        return redirect()->route('job',$id)->with('success', 'Your application is sent successfully!');
    }

    public function applications()
    {
        $applied_jobs = UserApplication::with('rJob')->where('user_id',Auth::guard('user')->user()->id)->get();
        return view('client.user.job_applications.applications', compact('applied_jobs'));
    }
}
