<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;

class CompanyLocationController extends Controller
{
    public function index()
    {
          $company_locations = CompanyLocation::all();

          return view('admin.company-location.index', compact('company_locations'));
    }
    
    public function create()
    {
          return view('admin.company-location.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $company_location = new CompanyLocation();
          $company_location->name = $request->name;

          $company_location->save();

          return redirect()->route('admin.company-location')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $company_location = CompanyLocation::find($id);
           return view('admin.company-location.edit', compact('company_location'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $company_location = CompanyLocation::find($id);

          $company_location->name = $request->name;

          $company_location->update();

          return redirect()->route('admin.company-location')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $company_location = CompanyLocation::find($id);
          $company_location ->delete();

          return redirect()->route('admin.company-location')->with('success', 'Deleted successfully!!');
    }
}
