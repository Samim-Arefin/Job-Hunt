<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::first();
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        
        return view('client.home', compact('page_home_data','job_categories'));
    }
    
    public function job_categories()
    {
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        
        return view('client.job_categories', compact('job_categories'));
    }

    public function terms()
    {
        return view('client.terms');
    }
}
