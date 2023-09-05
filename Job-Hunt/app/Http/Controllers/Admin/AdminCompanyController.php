<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyPhoto;
use App\Models\Job;
use App\Models\UserApplication;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use App\Models\UserSkill;
use App\Models\UserAward;
use App\Models\UserResume;
use App\Models\Order;


class AdminCompanyController extends Controller
{
   public function index()
    {
        $companies = Company::where('status',1)->get();
        return view('admin.company.index', compact('companies'));
    }

    public function companies_details($id)
    {
        $companies_detail = Company::with('rCompanyLocation','rCompanyIndustry','rCompanySize')->where('id',$id)->first();
        $photos = CompanyPhoto::where('company_id',$id)->get();
        return view('admin.company.companies_details', compact('companies_detail','photos'));
    }

    public function companies_jobs($id)
    {
        $companies_detail = Company::where('id',$id)->first();
        $companies_jobs = Job::with('rJobCategory','rJobLocation')->where('company_id',$id)->get();
        return view('admin.company.companies_jobs', compact('companies_jobs','companies_detail'));
    }

    public function companies_applicants($id)
    {
        $job_detail = Job::where('id',$id)->first();
        $applicants = UserApplication::with('rUser')->where('job_id',$id)->get();
        return view('admin.company.companies_applicants', compact('applicants','job_detail'));
    }

    public function companies_applicant_resume($id)
    {
        $candidate_single = User::where('id',$id)->first();
        $candidate_educations = UserEducation::where('user_id',$id)->get();
        $candidate_experiences = UserWorkExperience::where('user_id',$id)->get();
        $candidate_skills = UserSkill::where('user_id',$id)->get();
        $candidate_awards = UserAward::where('user_id',$id)->get();
        $candidate_resumes = UserResume::where('user_id',$id)->get();

        return view('admin.company.companies_applicant_resume', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
    }

    public function delete($id)
    {
        $company_photos = CompanyPhoto::where('company_id',$id)->get();
        foreach($company_photos as $item) {
            unlink(public_path('uploads/'.$item->photo));
        }
        
        $company_data = Company::where('id',$id)->first();
        if($company_data->logo != null) {
            unlink(public_path('uploads/'.$company_data->logo));
        }

        Company::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
