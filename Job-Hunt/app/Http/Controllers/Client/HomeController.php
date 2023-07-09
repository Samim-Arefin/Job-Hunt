<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;
use App\Models\Location;
use App\Models\JobCategory;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\PageTermItem;
use App\Models\PagePrivacyItem;
use App\Models\Package;


class HomeController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::first();
        $job_locations = Location::orderBy('name', 'asc')->get();
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $why_choose_items = WhyChooseItem::all();
        $testimonials = Testimonial::all();
        
        return view('client.home', compact('page_home_data', 'job_locations', 'job_categories', 'why_choose_items', 'testimonials'));
    }
    
    public function job_categories()
    {
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        
        return view('client.job_categories', compact('job_categories'));
    }

    public function terms()
    {
        $page_term_data = PageTermItem::first();
        return view('client.terms', compact('page_term_data'));
    }

    public function privacy()
    {
        $page_privacy_data = PagePrivacyItem::first();
        return view('client.privacy', compact('page_privacy_data'));
    }

    public function pricing()
    {
          $packages = Package::all();

          return view('client.pricing', compact('packages'));
    }
}
