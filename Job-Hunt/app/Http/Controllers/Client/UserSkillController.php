<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSkill;
use Auth;

class UserSkillController extends Controller
{
    public function index()
    {
        $skills = UserSkill::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        return view('client.user.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('client.user.skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);

        $skill = new UserSkill();
        $skill->user_id = Auth::guard('user')->user()->id;
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->save();

        return redirect()->route('user.skill')->with('success', 'Skill is added successfully!!');
    }

    public function edit($id)
    {
        $skill = UserSkill::find($id);

        return view('client.user.skill.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = UserSkill::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);
        
        if($skill != null)
        {
           $skill->name = $request->name;
           $skill->level = $request->level;

           $skill->update();

           return redirect()->route('user.skill')->with('success', 'Skill is updated successfully.');
        }
        return redirect()->route('user.skill')->with('error', 'Skill id not found!!');
    }

    public function delete($id)
    {
        $skill = UserSkill::find($id);

        if($skill != null )
        {
            $skill->delete();
            return redirect()->route('user.skill')->with('success', 'Skill is deleted successfully.');
        }
        return redirect()->route('user.skill')->with('error', 'Skill id not found!!');
    }
}
