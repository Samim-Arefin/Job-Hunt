<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserResume;
use Auth;

class UserResumeController extends Controller
{
    public function index()
    {
        $resumes = UserResume::where('user_id', Auth::guard('user')->user()->id)->get();
        return view('client.user.resume.index', compact('resumes'));
    }

    public function create()
    {
        return view('client.user.resume.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $ext = $request->file('file')->extension();
        $file_name = 'resume_'.time().'.'.$ext;
        $request->file('file')->move(public_path('uploads/'),$file_name);

        $resume = new UserResume();
        $resume->user_id = Auth::guard('user')->user()->id;
        $resume->name = $request->name;
        $resume->file = $file_name;
        $resume->save();

        return redirect()->route('user.resume')->with('success', 'Resume is added successfully!!');
    }

    public function edit($id)
    {
        $resume = UserResume::find($id);

        return view('client.user.resume.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $resume = UserResume::find($id);

        $request->validate([
            'name' => 'required'
        ]);

        if($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,doc,docx'
            ]);

            unlink(public_path('uploads/'.$resume->file));

            $ext = $request->file('file')->extension();
            $file_name = 'resume_'.time().'.'.$ext;

            $request->file('file')->move(public_path('uploads/'),$file_name);

            $resume->file = $file_name;
        }
        
        $resume->name = $request->name;
        $resume->update();

        return redirect()->route('user.resume')->with('success', 'Resume is updated successfully!!');
    }

    public function delete($id)
    {
        $resume = UserResume::find($id);

        if($resume != null )
        {
            unlink(public_path('uploads/'.$resume->file));
            $resume->delete();
            return redirect()->route('user.resume')->with('success', 'Resume is deleted successfully!!');
        }
        return redirect()->route('user.resume')->with('error', 'Resume id not found!!');
    }
}
