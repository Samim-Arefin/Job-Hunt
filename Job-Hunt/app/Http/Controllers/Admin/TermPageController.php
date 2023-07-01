<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTermItem;

class TermPageController extends Controller
{
    public function index()
    {
        $page_term_data = PageTermItem::first();
        return view('admin.terms.index', compact('page_term_data'));
    }

    public function update(Request $request) 
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required'
        ]);

        $page_term_data = PageTermItem::first();
        
        $page_term_data->heading = $request->heading;
        $page_term_data->content = $request->content;
        $page_term_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
