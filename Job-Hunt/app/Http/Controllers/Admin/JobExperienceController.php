<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class JobExperienceController extends Controller
{
    public function index()
    {
          $job_experiences = JobExperience::all();

          return view('admin.job-experience.index', compact('job_experiences'));
    }
    
    public function create()
    {
          return view('admin.job-experience.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $job_experience = new JobExperience();
          $job_experience->name = $request->name;

          $job_experience->save();

          return redirect()->route('admin.job-experience')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_experience = JobExperience::find($id);
           return view('admin.job-experience.edit', compact('job_experience'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $job_experience = JobExperience::find($id);

          $job_experience->name = $request->name;

          $job_experience->update();

          return redirect()->route('admin.job-experience')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $job_experience = JobExperience::find($id);
          $job_experience ->delete();

          return redirect()->route('admin.job-experience')->with('success', 'Deleted successfully!!');
    }
}
