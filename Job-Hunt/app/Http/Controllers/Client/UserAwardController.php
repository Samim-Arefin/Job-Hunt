<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAward;
use Auth;

class UserAwardController extends Controller
{
    public function index()
    {
        $awards = UserAward::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        return view('client.user.award.index', compact('awards'));
    }

    public function create()
    {
        return view('client.user.award.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $award = new UserAward();
        $award->user_id = Auth::guard('user')->user()->id;
        $award->title = $request->title;
        $award->description = $request->description;
        $award->date = $request->date;
        $award->save();

        return redirect()->route('user.award')->with('success', 'Award is added successfully!!');
    }

    public function edit($id)
    {
        $award = UserAward::find($id);

        return view('client.user.award.edit', compact('award'));
    }

    public function update(Request $request, $id)
    {
        $award = UserAward::where('id',$id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);
        
        if($award != null)
        {
           $award->title = $request->title;
           $award->description = $request->description;
           $award->date = $request->date;

           $award->update();

           return redirect()->route('user.award')->with('success', 'Award is updated successfully.');
        }
        return redirect()->route('user.award')->with('error', 'Award id not found!!');
    }

    public function delete($id)
    {
        $award = UserAward::find($id);

        if($award != null )
        {
            $award->delete();
            return redirect()->route('user.award')->with('success', 'Award is deleted successfully.');
        }
        return redirect()->route('user.award')->with('error', 'Award id not found!!');
    }
}
