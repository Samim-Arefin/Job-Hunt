<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyIndustry;
use App\Models\CompanyPhoto;
use Illuminate\Validation\Rule;
use Auth;
use Hash;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        
        if($current_plan != null)
        {
             $currentDate = date_create(date('Y-m-d'));
             $targetDate = date_create($current_plan->ending_date);
             $diff = date_diff($currentDate, $targetDate);
             $remainingDays = $diff->format("%a");

             if($remainingDays == '0')
             {
                  $current_plan->delete();
             }
        }
        
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

         $photos = CompanyPhoto::where('company_id', $id)->get();
         if($photos != null)
         {
            foreach($photos as $photo)
            {
                unlink(public_path('uploads/'.$photo->photo));
                $photo->delete();
            }
         }
         return redirect()->back()->with('success', 'Sucessfully cancel the plan!!');
    }

    public function edit_profile()
    {
        $company_locations = CompanyLocation::orderBy('id', 'asc')->get();
        $company_sizes = CompanySize::orderBy('id', 'asc')->get();
        $company_industries = CompanyIndustry::orderBy('id', 'asc')->get();

        return view('client.company.edit_profile', compact('company_locations', 'company_sizes', 'company_industries'));
    }

    public function edit_profile_submit(Request $request)
    {
        $company = Company::where('id',Auth::guard('company')->user()->id)->first();
        $id = $company->id;
        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('companies')->ignore($id)],
        ]);

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if(Auth::guard('company')->user()->logo != '') {
                unlink(public_path('uploads/'.$company->logo));
            }            

            $ext = $request->file('logo')->extension();
            $file_name = 'company_logo_'.time().'.'.$ext;

            $request->file('logo')->move(public_path('uploads/'),$file_name);

            $company->logo = $file_name;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->company_location_id = $request->company_location_id;
        $company->company_industry_id = $request->company_industry_id;
        $company->company_size_id = $request->company_size_id;
        $company->founded_on = $request->founded_on;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->mon = $request->mon;
        $company->tue = $request->tue;
        $company->wed = $request->wed;
        $company->thu = $request->thu;
        $company->fri = $request->fri;
        $company->map_code = $request->map_code;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->linkedin = $request->linkedin;
        $company->instagram = $request->instagram;
        $company->update();

        return redirect()->back()->with('success', 'Company profile is updated successfully.');
    }
    
    public function edit_password()
    {
          return view('client.company.edit_password');
    }

    public function edit_password_submit(Request $request)
    {
        $company = Auth::guard('company')->user();

        if($request->password != '') 
        {
            $request->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);
            $company->password = Hash::make($request->password);
            $company->update();
            return redirect()->back()->with('success', 'Updated successfully!!');
        }

         return redirect()->back()->with('success', 'Updated successfully!!');
    }

    public function photos()
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        if($current_plan != null )
        {
           if($current_plan->rPackage->total_allowed_photos == 0)
           {
               return redirect()->route('company.current-plan')->with('error', 'Your current plan is '.$current_plan->rPackage->name);
           }
           else
           {
                $photos = CompanyPhoto::all();
                return view('client.company.photos', compact('photos'));
           }
        }
        else
        {
            return redirect()->route('company.current-plan')->with('error', 'No plan is activated');
        }
    }

    public function photo_submit(Request $request)
    {
        $company = Auth::guard('company')->user();
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();
        $photos = CompanyPhoto::where('company_id', $company->id)->count();
        
        if($current_plan->rPackage->total_allowed_photos == $photos)
        {
            return redirect()->back()->with('error', 'Quota is filled up. '.$current_plan->rPackage->name.' package has allowed maxmium '.$current_plan->rPackage->total_allowed_photos.' photos');
        }
        else
        {
            $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);

            $photo = new CompanyPhoto();

            $ext = $request->file('photo')->extension();
            $file_name = 'company_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $file_name);

            $photo->photo = $file_name;
            $photo->company_id = Auth::guard('company')->user()->id;
            $photo->save();

            return redirect()->back()->with('success', 'Uploaded successfully!!');
        }
    }

    public function photo_delete($id)
    {
        $photo  = CompanyPhoto::find($id);

        if($photo != null)
        {
            unlink(public_path('uploads/'.$photo->photo));
            $photo ->delete();
            return redirect()->route('company.photos')->with('success', 'Deleted successfully!!');
        }
        else
        {
            return redirect()->route('company.photos')->with('error', 'Photo not found!!');
        }
    }
}
