<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWorkExperience;
use Auth;

class UserWorkExperienceController extends Controller
{
     public function index()
    {
        $work_experiences = UserWorkExperience::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        return view('client.user.experience.index', compact('work_experiences'));
    }

    public function create()
    {
        return view('client.user.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'designation' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $work_experience = new UserWorkExperience();
        $work_experience->user_id = Auth::guard('user')->user()->id;
        $work_experience->company_name = $request->company_name;
        $work_experience->designation = $request->designation;
        $work_experience->starting_date = $request->starting_date;
        $work_experience->ending_date = $request->ending_date;
        $work_experience->save();

        return redirect()->route('user.work-experience')->with('success', 'Work experience is added successfully!!');
    }

    public function edit($id)
    {
        $work_experience = UserWorkExperience::find($id);

        return view('client.user.experience.edit', compact('work_experience'));
    }

    public function update(Request $request, $id)
    {
        $work_experience = UserWorkExperience::where('id',$id)->first();

        $request->validate([
            'company_name' => 'required',
            'designation' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);
        
        if($work_experience != null)
        {
           $work_experience->company_name = $request->company_name;
           $work_experience->designation = $request->designation;
           $work_experience->starting_date = $request->starting_date;
           $work_experience->ending_date = $request->ending_date;

           $work_experience->update();

           return redirect()->route('user.work-experience')->with('success', 'Work experience is updated successfully.');
        }
        return redirect()->route('user.work-experience')->with('error', 'Work experience id not found!!');
    }

    public function delete($id)
    {
        $work_experience = UserWorkExperience::find($id);

        if($work_experience != null )
        {
            $work_experience->delete();
            return redirect()->route('user.work-experience')->with('success', 'Work experience is deleted successfully.');
        }
        return redirect()->route('user.work-experience')->with('error', 'Work experience id not found!!');
    }
}
