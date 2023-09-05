<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyPhoto;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;

class CompanyListingController extends Controller
{
    public function index(Request $request)
    {
        $company_industries = CompanyIndustry::orderBy('name','asc')->get();
        $company_locations = CompanyLocation::orderBy('name','asc')->get();
        $company_sizes = CompanySize::orderBy('id','asc')->get();

        $form_name = $request->name;
        $form_industry = $request->industry;
        $form_location = $request->location;
        $form_size = $request->size;
        $form_founded = $request->founded;

        $companies = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation','rCompanySize')->orderBy('id','desc');

        if($request->name != null) {
            $companies = $companies->where('name','LIKE','%'.$request->name.'%');
        }

        if($request->industry != null) {
            $companies = $companies->where('company_industry_id',$request->industry);
        }

        if($request->location != null) {
            $companies = $companies->where('company_location_id',$request->location);
        }

        if($request->size != null) {
            $companies = $companies->where('company_size_id',$request->size);
        }

        if($request->founded != null) {
            $companies = $companies->where('founded_on',$request->founded);
        }
       
        $companies = $companies->paginate(9);

        return view('client.company_listing', compact('companies','company_industries','company_locations','company_sizes','form_name','form_industry','form_location','form_size','form_founded'));
    }

    public function detail($id)
    {
        $order_data = Order::where('company_id',$id)->where('currently_active',1)->first();
        if(date('Y-m-d') > $order_data->ending_date) {
            return redirect()->route('home');
        }

        $company_single = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation','rCompanySize')->where('id',$id)->first();

        if(CompanyPhoto::where('company_id',$company_single->id)->exists()) {
            $company_photos = CompanyPhoto::where('company_id',$company_single->id)->get();
        } else {
            $company_photos = '';
        }

        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->where('company_id',$company_single->id)->get();

        return view('client.company', compact('company_single','company_photos','jobs'));
    }

    public function send_email(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required'
        ]);

        $subject = 'Contact Form Message: '.$request->job_title;
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        Mail::to($request->receive_email)->send(new AuthEmail($subject, $message));

        return redirect()->back()->with('success', 'Email is sent successfully!');

    }
}
