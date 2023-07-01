<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePrivacyItem;

class PrivacyPageController extends Controller
{
    public function index()
    {
        $page_privacy_data = PagePrivacyItem::first();
        return view('admin.privacy.index', compact('page_privacy_data'));
    }

    public function update(Request $request) 
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required'
        ]);

        $page_privacy_data = PagePrivacyItem::first();
        
        $page_privacy_data->heading = $request->heading;
        $page_privacy_data->content = $request->content;
        $page_privacy_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
