<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSalaryRange;
use App\Models\Job;

class JobSalaryRangeController extends Controller
{
    public function index()
    {
          $job_salary_ranges = JobSalaryRange::all();

          return view('admin.job-salary-range.index', compact('job_salary_ranges'));
    }
    
    public function create()
    {
          return view('admin.job-salary-range.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $job_salary_range = new JobSalaryRange();
          $job_salary_range->name = $request->name;

          $job_salary_range->save();

          return redirect()->route('admin.job-salary-range')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_salary_range = JobSalaryRange::find($id);
           return view('admin.job-salary-range.edit', compact('job_salary_range'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $job_salary_range = JobSalaryRange::find($id);

          $job_salary_range->name = $request->name;

          $job_salary_range->update();

          return redirect()->route('admin.job-salary-range')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Job::where('job_salary_range_id',$id)->count();
          if($check>0) 
          {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }
          $job_salary_range = JobSalaryRange::find($id);
          $job_salary_range ->delete();

          return redirect()->route('admin.job-salary-range')->with('success', 'Deleted successfully!!');
    }
}
