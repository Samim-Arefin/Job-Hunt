<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGender;

class JobGenderController extends Controller
{
    public function index()
    {
          $job_genders = JobGender::all();

          return view('admin.job-gender.index', compact('job_genders'));
    }
    
    public function create()
    {
          return view('admin.job-gender.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $job_gender = new JobGender();
          $job_gender->name = $request->name;

          $job_gender->save();

          return redirect()->route('admin.job-gender')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_gender = JobGender::find($id);
           return view('admin.job-gender.edit', compact('job_gender'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $job_gender = JobGender::find($id);

          $job_gender->name = $request->name;

          $job_gender->update();

          return redirect()->route('admin.job-gender')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $job_gender = JobGender::find($id);
          $job_gender ->delete();

          return redirect()->route('admin.job-gender')->with('success', 'Deleted successfully!!');
    }
}
