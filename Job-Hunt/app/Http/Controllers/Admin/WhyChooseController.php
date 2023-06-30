<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseItem;

class WhyChooseController extends Controller
{
    public function index()
    {
        $why_choose_items = WhyChooseItem::all();

        return view('admin.why-choose-us.index', compact('why_choose_items'));
    }

    public function create()
    {
          return view('admin.why-choose-us.create');
    }
    
    public function store(Request $request)
    {
          $validated = $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required'
          ]);
         
          $why_choose_item = new WhyChooseItem();
          $why_choose_item->heading = $request->heading;
          $why_choose_item->text = $request->text;
          $why_choose_item->icon = $request->icon;

          $why_choose_item->save();

          return redirect()->route('admin.why-choose-us')->with('success', 'Added successfully!!');
    }

    public function edit($id)
    {
           $why_choose_item = WhyChooseItem::find($id);
           return view('admin.why-choose-us.edit', compact('why_choose_item'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required'
          ]);
         
          $why_choose_item  = WhyChooseItem::find($id);

          $why_choose_item->heading = $request->heading;
          $why_choose_item->text = $request->text;
          $why_choose_item->icon = $request->icon;

          $why_choose_item->update();

          return redirect()->route('admin.why-choose-us')->with('success', 'Updated successfully!!');
    }

    public function delete($id)
    {
          $why_choose_item  = WhyChooseItem::find($id);
          $why_choose_item ->delete();

          return redirect()->route('admin.why-choose-us')->with('success', 'Deleted successfully!!');
    }
}
