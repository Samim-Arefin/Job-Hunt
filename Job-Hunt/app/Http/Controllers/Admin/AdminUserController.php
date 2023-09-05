<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserApplication;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use App\Models\UserSkill;
use App\Models\UserAward;
use App\Models\UserResume;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('status',1)->get();
        return view('admin.user.index', compact('users'));
    }

    public function user_details($id)
    {
        $candidate_single = User::where('id',$id)->first();
        $candidate_educations = UserEducation::where('user_id',$id)->get();
        $candidate_experiences = UserWorkExperience::where('user_id',$id)->get();
        $candidate_skills = UserSkill::where('user_id',$id)->get();
        $candidate_awards = UserAward::where('user_id',$id)->get();
        $candidate_resumes = UserResume::where('user_id',$id)->get();

        return view('admin.user.user_details', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
    }

    public function user_applied_jobs($id)
    {
        $applications = UserApplication::with('rJob')->where('user_id',$id)->get();
        return view('admin.user.user_applied_jobs',compact('applications'));
    }

    public function delete($id)
    {
        $resume_data = UserResume::where('user_id',$id)->get();
        foreach($resume_data as $item) {
            unlink(public_path('uploads/'.$item->file));
        }

        $candidate_data = User::where('id',$id)->first();
        if($candidate_data->photo != null) {
            unlink(public_path('uploads/'.$candidate_data->photo));
        }
        User::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
