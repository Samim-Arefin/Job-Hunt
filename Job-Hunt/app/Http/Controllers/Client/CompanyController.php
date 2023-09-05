<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyIndustry;
use App\Models\CompanyPhoto;
use App\Models\Job;
use App\Models\Location;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobSalaryRange;
use App\Models\UserApplication;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use App\Models\UserSkill;
use App\Models\UserAward;
use App\Models\UserResume;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
use Illuminate\Validation\Rule;
use Auth;
use Hash;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        
        if($current_plan != null)
        {
             $currentDate = date_create(date('Y-m-d'));
             $targetDate = date_create($current_plan->ending_date);
             $diff = date_diff($currentDate, $targetDate);
             $remainingDays = $diff->format("%a");

             if($remainingDays == '0')
             {
                  $current_plan->delete();
             }
        }
        
        $total_opened_jobs = Job::where('company_id', $company->id)->count();
        $total_featured_jobs = Job::where('company_id', $company->id)->where('is_featured', 1)->count();
        $total_urgent_jobs = Job::where('company_id', $company->id)->where('is_urgent', 1)->count();

        return view('client.company.dashboard', compact('total_opened_jobs','total_featured_jobs','total_urgent_jobs'));
    }

    public function package(Package $package)
    {
        return view('client.company.checkout', compact('package'));
    }

    public function current_plan()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();

        return view('client.company.current_plan', compact('current_plan'));
    }

    public function cancel_plan($id)
    {
         $current_plan = Order::where('company_id', $id)->first();
         $current_plan->delete($current_plan->id);

         $photos = CompanyPhoto::where('company_id', $id)->get();
         if($photos != null)
         {
            foreach($photos as $photo)
            {
                unlink(public_path('uploads/'.$photo->photo));
                $photo->delete();
            }
         }
        
        $jobs = Job::where('company_id', $id)->get();

        if($jobs != null)
        {
           foreach($jobs as $job)
            {
                $job->delete();
            }
        }

         return redirect()->back()->with('success', 'Sucessfully cancel the plan!!');
    }

    public function edit_profile()
    {
        $company_locations = CompanyLocation::orderBy('id', 'asc')->get();
        $company_sizes = CompanySize::orderBy('id', 'asc')->get();
        $company_industries = CompanyIndustry::orderBy('id', 'asc')->get();

        return view('client.company.edit_profile', compact('company_locations', 'company_sizes', 'company_industries'));
    }

    public function edit_profile_submit(Request $request)
    {
        $company = Company::where('id',Auth::guard('company')->user()->id)->first();
        $id = $company->id;
        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('companies')->ignore($id)],
        ]);

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(Auth::guard('company')->user()->logo != '') {
                unlink(public_path('uploads/'.$company->logo));
            }            

            $ext = $request->file('logo')->extension();
            $file_name = 'company_logo_'.time().'.'.$ext;

            $request->file('logo')->move(public_path('uploads/'),$file_name);

            $company->logo = $file_name;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->company_location_id = $request->company_location_id;
        $company->company_industry_id = $request->company_industry_id;
        $company->company_size_id = $request->company_size_id;
        $company->founded_on = $request->founded_on;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->mon = $request->mon;
        $company->tue = $request->tue;
        $company->wed = $request->wed;
        $company->thu = $request->thu;
        $company->fri = $request->fri;
        $company->map_code = $request->map_code;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->linkedin = $request->linkedin;
        $company->instagram = $request->instagram;
        $company->update();

        return redirect()->back()->with('success', 'Company profile is updated successfully.');
    }
    
    public function edit_password()
    {
          return view('client.company.edit_password');
    }

    public function edit_password_submit(Request $request)
    {
        $company = Auth::guard('company')->user();

        if($request->password != '') 
        {
            $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);
            $company->password = Hash::make($request->password);
            $company->update();
            return redirect()->back()->with('success', 'Updated successfully!!');
        }

         return redirect()->back()->with('success', 'Updated successfully!!');
    }

    public function photos()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        if($current_plan != null )
        {
           if($current_plan->rPackage->total_allowed_photos == 0)
           {
               return redirect()->route('company.current-plan')->with('error', 'Your current plan is '.$current_plan->rPackage->name);
           }
           else
           {
                $photos = CompanyPhoto::all();
                return view('client.company.photos', compact('photos'));
           }
        }
        else
        {
            return redirect()->route('company.current-plan')->with('error', 'No plan is activated');
        }
    }

    public function photo_submit(Request $request)
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        $photos = CompanyPhoto::where('company_id', $company->id)->count();
        
        if($current_plan->rPackage->total_allowed_photos == $photos)
        {
            return redirect()->back()->with('error', 'Quota is filled up. '.$current_plan->rPackage->name.' package has allowed maxmium '.$current_plan->rPackage->total_allowed_photos.' photos');
        }
        else
        {
            $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);

            $photo = new CompanyPhoto();

            $ext = $request->file('photo')->extension();
            $file_name = 'company_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $file_name);

            $photo->photo = $file_name;
            $photo->company_id = Auth::guard('company')->user()->id;
            $photo->save();

            return redirect()->back()->with('success', 'Uploaded successfully!!');
        }
    }

    public function photo_delete($id)
    {
        $photo  = CompanyPhoto::find($id);

        if($photo != null)
        {
            unlink(public_path('uploads/'.$photo->photo));
            $photo ->delete();
            return redirect()->route('company.photos')->with('success', 'Deleted successfully!!');
        }
        else
        {
            return redirect()->route('company.photos')->with('error', 'Photo not found!!');
        }
    }
    
    public function jobs()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();

        if($current_plan != null )
        {
            $jobs = Job::with('rJobCategory')->where('company_id', $company->id)->get();
            return view('client.company.jobs', compact('jobs'));
        }
        else
        {
           return redirect()->route('company.current-plan')->with('error', 'No plan is activated');
        }
    }

    public function create_job()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
       
        if($current_plan != null )
        {
           $job_categories = JobCategory::orderBy('name','asc')->get();
           $job_locations = Location::orderBy('name','asc')->get();
           $job_types = JobType::orderBy('name','asc')->get();
           $job_experiences = JobExperience::orderBy('id','asc')->get();
           $job_genders = JobGender::orderBy('id','asc')->get();
           $job_salary_ranges = JobSalaryRange::orderBy('id','asc')->get();

           return view('client.company.create_job', compact('job_categories','job_locations','job_types','job_experiences','job_genders','job_salary_ranges'));
        }
        else
        {
           return redirect()->route('company.current-plan')->with('error', 'No plan is activated');
        }

    }

    private function create_job_store(Request $request)
    {
        $job = new Job();
        $job->company_id = Auth::guard('company')->user()->id;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->skill = $request->skill;
        $job->education = $request->education;
        $job->benefit = $request->benefit;
        $job->deadline = $request->deadline;
        $job->vacancy = $request->vacancy;
        $job->job_category_id = $request->job_category_id;
        $job->job_location_id = $request->job_location_id;
        $job->job_type_id = $request->job_type_id;
        $job->job_experience_id = $request->job_experience_id;
        $job->job_gender_id = $request->job_gender_id;
        $job->job_salary_range_id = $request->job_salary_range_id;
        $job->map_code = $request->map_code;
        $job->is_featured = $request->is_featured;
        $job->is_urgent = $request->is_urgent;
        $job->save();

        return redirect()->back();
    }

    public function create_job_submit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required'
        ]);

        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        $jobs = Job::where('company_id', $company->id)->count();

        if($current_plan != null)
        {
            if($current_plan->rPackage->total_allowed_jobs != $jobs)
            {
                if($request->is_featured == 1)
                {
                    $total_featured_jobs = Job::where('company_id', $company->id)->where('is_featured',1)->count();
                    if($current_plan->rPackage->total_allowed_featured_jobs != $total_featured_jobs)
                    {
                        $this->create_job_store($request);
                        return redirect()->route('company.jobs')->with('success', 'Job is posted successfully!');
                    }
                    else
                    {
                        return redirect()->route('company.jobs')->with('error', 'You already have added the total number of featured jobs');
                    }
                }
                else
                {
                    $this->create_job_store($request);
                    return redirect()->route('company.jobs')->with('success', 'Job is posted successfully!');
                }
            }
            else
            {
               return redirect()->route('company.jobs')->with('error', 'You already have posted the maximum number of allowed jobs');
            }
        }
        else
        {
           return redirect()->route('company.current-plan')->with('error', 'No plan is activated');
        }
    }
    
    public function edit_job($id)
    {
        $job = Job::where('id',$id)->first();
        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_locations = Location::orderBy('name','asc')->get();
        $job_types = JobType::orderBy('name','asc')->get();
        $job_experiences = JobExperience::orderBy('id','asc')->get();
        $job_genders = JobGender::orderBy('id','asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id','asc')->get();
        
        return view('client.company.edit_job', compact('job','job_categories','job_locations','job_types','job_experiences','job_genders','job_salary_ranges'));
    }
    
    private function update_job_store(Job $job, Request $request)
    {
        $job->title = $request->title;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->skill = $request->skill;
        $job->education = $request->education;
        $job->benefit = $request->benefit;
        $job->deadline = $request->deadline;
        $job->vacancy = $request->vacancy;
        $job->job_category_id = $request->job_category_id;
        $job->job_location_id = $request->job_location_id;
        $job->job_type_id = $request->job_type_id;
        $job->job_experience_id = $request->job_experience_id;
        $job->job_gender_id = $request->job_gender_id;
        $job->job_salary_range_id = $request->job_salary_range_id;
        $job->map_code = $request->map_code;
        $job->is_featured = $request->is_featured;
        $job->is_urgent = $request->is_urgent;
        $job->update();

        return redirect()->back();
    }

    public function update_job($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required'
        ]);

        $job  = Job::find($id);

        if($job != null)
        {
            if(($request->is_featured == 1 && $job->is_featured == 1) || (($request->is_featured == 0 && $job->is_featured == 0)))
            {
                $this->update_job_store($job, $request);
                return redirect()->route('company.jobs')->with('success', 'Job is updated successfully!');
            }
            else if($request->is_featured == 0 && $job->is_featured == 1)
            {
                $this->update_job_store($job, $request);
                return redirect()->route('company.jobs')->with('success', 'Job is updated successfully!');
            }
            else
            {
                $total_featured_jobs = Job::where('company_id', $job->company_id)->where('is_featured',1)->count();
                $current_plan = Order::where('company_id', $job->company_id)->where('currently_active', 1)->first();
                if($current_plan->rPackage->total_allowed_featured_jobs != $total_featured_jobs)
                {
                    $this->update_job_store($job, $request);
                    return redirect()->route('company.jobs')->with('success', 'Job is updated successfully!');
                }
                else
                {
                    return redirect()->route('company.jobs')->with('error', 'You already have added the total number of featured jobs');
                }
            }
        }
        else
        {
            return redirect()->route('company.jobs')->with('error', 'Failed to update job!');
        }
    }

    public function delete_job($id)
    {
        $job  = Job::find($id);

        if($job != null)
        {
            $job ->delete();
            return redirect()->back()->with('success', 'Deleted successfully!!');
        }
        else
        {
            return redirect()->back()->with('error', 'job not found!!');
        }
    }

     public function applications()
    {
        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobGender','rJobExperience','rJobSalaryRange')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('client.company.applications', compact('jobs'));
    }

    public function applicant($id)
    {
        $applicants = UserApplication::with('rUser')->where('job_id',$id)->get();
        $job_single = Job::where('id',$id)->first();

        return view('client.company.applicants', compact('applicants','job_single'));
    }

    public function applicant_resume($id)
    {
        $candidate_single = User::where('id',$id)->first();
        $candidate_educations = UserEducation::where('user_id',$id)->get();
        $candidate_experiences = UserWorkExperience::where('user_id',$id)->get();
        $candidate_skills = UserSkill::where('user_id',$id)->get();
        $candidate_awards = UserAward::where('user_id',$id)->get();
        $candidate_resumes = UserResume::where('user_id',$id)->get();

        return view('client.company.applicant_resume', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
    }

    public function application_status_change(Request $request)
    {
        $obj = UserApplication::with('rUser')->where('user_id',$request->user_id)->where('job_id',$request->job_id)->first();
        $obj->status = $request->status;
        $obj->update();

        $user_email = $obj->rUser->email;

        if($request->status == 'Approved') {
            $detail_link = route('user.applications');
            $subject = 'Congratulation! Your application has approved';
            $message = 'Please check for details: <br>';
            $message .= '<a href="'.$detail_link.'">Click here to see the details</a>';

           Mail::to($user_email)->send(new AuthEmail($subject, $message));
        }

        return redirect()->back()->with('success', 'Status is changed successfully!');
    }
}
