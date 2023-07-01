<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContactItem;


class ContactPageController extends Controller
{
    public function index()
    {
        $page_contact_data = PageContactItem::first();
        return view('admin.contact.index', compact('page_contact_data'));
    }

    public function update(Request $request) 
    {
        $request->validate([
            'heading' => 'required',
            'map_code' => 'required'
        ]);

        $page_contact_data = PageContactItem::first();
        
        $page_contact_data->heading = $request->heading;
        $page_contact_data->map_code = $request->map_code;
        $page_contact_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
