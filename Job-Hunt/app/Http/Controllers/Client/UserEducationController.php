<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEducation;
use Auth;

class UserEducationController extends Controller
{
    public function index()
    {
        $educations = UserEducation::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        return view('client.user.education.index', compact('educations'));
    }

    public function create()
    {
        return view('client.user.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $education = new UserEducation();
        $education->user_id = Auth::guard('user')->user()->id;
        $education->level = $request->level;
        $education->institute = $request->institute;
        $education->degree = $request->degree;
        $education->passing_year = $request->passing_year;
        $education->save();

        return redirect()->route('user.education')->with('success', 'Education is added successfully!!');
    }

    public function edit($id)
    {
        $education = UserEducation::find($id);

        return view('client.user.education.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $education = UserEducation::where('id',$id)->first();

        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);
        
        if($education != null)
        {
           $education->level = $request->level;
           $education->institute = $request->institute;
           $education->degree = $request->degree;
           $education->passing_year = $request->passing_year;
           $education->update();

           return redirect()->route('user.education')->with('success', 'Education is updated successfully.');
        }
        return redirect()->route('user.education')->with('error', 'Education id not found!!');
    }

    public function delete($id)
    {
        $education = UserEducation::find($id);

        if($education != null )
        {
            $education->delete();
            return redirect()->route('user.education')->with('success', 'Education is deleted successfully.');
        }
        return redirect()->route('user.education')->with('error', 'Education id not found!!');
    }
}
