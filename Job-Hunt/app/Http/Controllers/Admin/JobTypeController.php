<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;
use App\Models\Job;

class JobTypeController extends Controller
{
    public function index()
    {
          $job_types = JobType::all();

          return view('admin.job-type.index', compact('job_types'));
    }
    
    public function create()
    {
          return view('admin.job-type.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $job_type = new JobType();
          $job_type->name = $request->name;

          $job_type->save();

          return redirect()->route('admin.job-type')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_type = JobType::find($id);
           return view('admin.job-type.edit', compact('job_type'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $job_type = JobType::find($id);

          $job_type->name = $request->name;

          $job_type->update();

          return redirect()->route('admin.job-type')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Job::where('job_type_id',$id)->count();
          if($check>0) 
          {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }

          $job_type = JobType::find($id);
          $job_type ->delete();

          return redirect()->route('admin.job-type')->with('success', 'Deleted successfully!!');
    }
}
