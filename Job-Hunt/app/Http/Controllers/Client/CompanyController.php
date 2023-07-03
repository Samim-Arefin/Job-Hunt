<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('client.company.dashboard');
    }

    public function package(Package $package)
    {
        return view('client.company.checkout', compact('package'));
    }

    public function current_plan()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();

        return view('client.company.current_plan', compact('current_plan'));
    }

    public function cancel_plan($id)
    {
         $current_plan = Order::where('company_id', $id)->first();
         $current_plan->delete($current_plan->id);
         
         return redirect()->back()->with('success', 'Sucessfully cancel the plan!!');
    }
}
