<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContactItem;
use App\Mail\AuthEmail;
use App\Models\Admin;

class ContactController extends Controller
{
    public function index()
    {
        $page_contact_data = PageContactItem::first();
        return view('client.contact', compact('page_contact_data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        $admin = Admin::first();

        $subject = 'Contact Message';
        $message = 'Information: <br>';
        $message .= 'Name: '.$request->name.'<br>';
        $message .= 'Email: '.$request->email.'<br>';
        $message .= 'Message: '.$request->message;

        \Mail::to($admin->email)->send(new AuthEmail($subject, $message));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
