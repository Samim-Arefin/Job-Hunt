<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;

class HomeController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::first();
        return view('client.home', compact('page_home_data'));
    }

    public function terms()
    {
        return view('client.terms');
    }
}
