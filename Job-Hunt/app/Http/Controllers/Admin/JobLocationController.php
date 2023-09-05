<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Job;

class JobLocationController extends Controller
{
    public function index()
    {
          $job_locations = Location::all();

          return view('admin.job-location.index', compact('job_locations'));
    }
    
    public function create()
    {
          return view('admin.job-location.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $job_location = new Location();
          $job_location->name = $request->name;

          $job_location->save();

          return redirect()->route('admin.job-location')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_location = Location::find($id);
           return view('admin.job-location.edit', compact('job_location'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $job_location = Location::find($id);

          $job_location->name = $request->name;

          $job_location->update();

          return redirect()->route('admin.job-location')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Job::where('job_location_id',$id)->count();
          if($check>0) 
          {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }
          $job_location = Location::find($id);
          $job_location ->delete();

          return redirect()->route('admin.job-location')->with('success', 'Deleted successfully!!');
    }
}
