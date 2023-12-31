<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;

class PackageController extends Controller
{
    public function index()
    {
          $packages = Package::all();

          return view('admin.package.index', compact('packages'));
    }
    
    public function create()
    {
          return view('admin.package.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'days' => 'required',
            'time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
          ]);
         
          $package = new Package();
          $package->name = $request->name;
          $package->price = $request->price;
          $package->days = $request->days;
          $package->time = $request->time;
          $package->total_allowed_jobs = $request->total_allowed_jobs;
          $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
          $package->total_allowed_photos = $request->total_allowed_photos;

          $package->save();

          return redirect()->route('admin.package')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $package = Package::find($id);
           return view('admin.package.edit', compact('package'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'days' => 'required',
            'time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
          ]);
         
          $package = Package::find($id);
          $package->name = $request->name;
          $package->price = $request->price;
          $package->days = $request->days;
          $package->time = $request->time;
          $package->total_allowed_jobs = $request->total_allowed_jobs;
          $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
          $package->total_allowed_photos = $request->total_allowed_photos;

          $package->update();

          return redirect()->route('admin.package')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $check = Order::where('package_id',$id)->count();
          if($check>0) 
          {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
          }
          
          $package  = Package::find($id);
          $package ->delete();

          return redirect()->route('admin.package')->with('success', 'Deleted successfully!!');
    }
}
