<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{

    public function index()
    {
          $testimonial = Testimonial::all();

          return view('admin.testimonial.index', compact('testimonial'));
    }

    public function create()
    {
      return view('admin.testimonial.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
             'name' => 'required',
             'designation' => 'required',
             'comment' => 'required',
             'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
          ]);
         
          $ext = $request->file('photo')->extension();
          $file_name = 'testimonial_'.time().'.'.$ext;
          $request->file('photo')->move(public_path('uploads/'),$file_name);

          $testimonial = new Testimonial();
          $testimonial->name = $request->name;
          $testimonial->designation = $request->designation;
          $testimonial->photo = $file_name;
          $testimonial->comment = $request->comment;

          $testimonial->save();

          return redirect()->route('admin.testimonial')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $testimonial = Testimonial::find($id);
           return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update($id, Request $request)
    {
          $validated = $request->validate([
              'name' => 'required',
              'designation' => 'required',
              'comment' => 'required',
          ]);

          $testimonial = Testimonial::find($id);

          if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$testimonial->photo));

            $ext = $request->file('photo')->extension();
            $file_name = 'testimonial'.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $file_name);

            $testimonial->photo = $file_name;
        }

          $testimonial->name = $request->name;
          $testimonial->designation = $request->designation;
          $testimonial->comment = $request->comment;

          $testimonial->update();

          return redirect()->route('admin.testimonial')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $testimonial  = Testimonial::find($id);
          unlink(public_path('uploads/'.$testimonial->photo));
          $testimonial ->delete();

          return redirect()->route('admin.testimonial')->with('success', 'Deleted successfully!!');
    }
}
