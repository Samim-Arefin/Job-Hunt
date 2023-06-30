<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    
    public function index()
    {
          $job_categories = JobCategory::all();

          return view('admin.job-category.index', compact('job_categories'));
    }
    
    public function create()
    {
          return view('admin.job-category.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required'
          ]);
         
          $job_category = new JobCategory();
          $job_category->name = $request->name;
          $job_category->icon = $request->icon;

          $job_category->save();

          return redirect()->route('admin.job-category')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $job_category = JobCategory::find($id);
           return view('admin.job-category.edit', compact('job_category'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required'
          ]);
          

          $job_category = JobCategory::find($id);

          $job_category->name = $request->name;
          $job_category->icon = $request->icon;

          $job_category->update();

          return redirect()->route('admin.job-category')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $job_category  = JobCategory::find($id);
          $job_category ->delete();

          return redirect()->route('admin.job-category')->with('success', 'Deleted successfully!!');
    }

}
