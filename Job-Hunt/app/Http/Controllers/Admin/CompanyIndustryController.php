<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIndustry;
use App\Models\Company;

class CompanyIndustryController extends Controller
{
    public function index()
    {
          $company_industries = CompanyIndustry::all();

          return view('admin.company-industry.index', compact('company_industries'));
    }
    
    public function create()
    {
          return view('admin.company-industry.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
         
          $company_industry = new CompanyIndustry();
          $company_industry->name = $request->name;

          $company_industry->save();

          return redirect()->route('admin.company-industry')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $company_industry = CompanyIndustry::find($id);
           return view('admin.company-industry.edit', compact('company_industry'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
          ]);
          

          $company_industry = CompanyIndustry::find($id);

          $company_industry->name = $request->name;

          $company_industry->update();

          return redirect()->route('admin.company-industry')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Company::where('company_industry_id',$id)->count();
          if($check>0) 
          {
             return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }
          $company_industry = CompanyIndustry::find($id);
          $company_industry ->delete();

          return redirect()->route('admin.company-industry')->with('success', 'Deleted successfully!!');
    }
}
