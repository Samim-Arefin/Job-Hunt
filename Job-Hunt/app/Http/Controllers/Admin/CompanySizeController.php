<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySize;
use App\Models\Company;

class CompanySizeController extends Controller
{
    public function index()
    {
          $company_sizes = CompanySize::all();

          return view('admin.company-size.index', compact('company_sizes'));
    }
    
    public function create()
    {
          return view('admin.company-size.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $company_size = new CompanySize();
          $company_size->name = $request->name;

          $company_size->save();

          return redirect()->route('admin.company-size')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $company_size = CompanySize::find($id);
           return view('admin.company-size.edit', compact('company_size'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $company_size = CompanySize::find($id);

          $company_size->name = $request->name;

          $company_size->update();

          return redirect()->route('admin.company-size')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Company::where('company_size_id',$id)->count();
          if($check>0) 
          {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }
          $company_size = CompanySize::find($id);
          $company_size ->delete();

          return redirect()->route('admin.company-size')->with('success', 'Deleted successfully!!');
    }
}
