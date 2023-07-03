<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Order;
use App\Models\Package;
use Auth;

class SslCommerzPaymentController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        
        $company = Auth::guard('company')->user();
        $package = Package::where('id', $request->package_id)->first();
        
        $current_plan = Order::where('company_id', $company->id)->where('currently_active', 1)->first();

        $post_data = array();
        $post_data['total_amount'] = $package->price;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); 

        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;

        $post_data['product_category'] = "Job Advertisement";
        $post_data['cus_phone'] = $request->mobile;

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = $package->name;
        $post_data['product_profile'] = "Abstract";
        
        if($current_plan == null)
        {
            $order = new Order();
            $order-> name = $request->name;
            $order-> email = $request->email;
            $order-> amount = $package->price;
            $order-> status = 'Pending';
            $order-> transaction_id = $post_data['tran_id'];
            $order-> currency = 'BDT';
            $order-> oder_no = time();
            $order-> company_id = $company->id;
            $order-> package_id = $package->id;
            $order-> starting_date = date('Y-m-d');
            $order-> ending_date = date('Y-m-d', strtotime("+$package->days days"));
            $order-> currently_active = 1;

            $order->save();
            

            $sslc = new SslCommerzNotification();
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }
        else
        {
            if(date('Y-m-d') == $current_plan->ending_date)
            {
                $current_plan-> name = $request->name;
                $current_plan-> email = $request->email;
                $current_plan-> amount = $package->price;
                $current_plan-> status = 'Pending';
                $current_plan-> transaction_id = $post_data['tran_id'];
                $current_plan-> currency = 'BDT';
                $current_plan-> oder_no = time();
                $current_plan-> company_id = $company->id;
                $current_plan-> package_id = $package->id;
                $current_plan-> starting_date = date('Y-m-d');
                $current_plan-> ending_date = date( 'Y-m-d', strtotime("+$package->days days"));

                $current_plan-> currently_active = 1;

                $current_plan->update();
                

                $sslc = new SslCommerzNotification();
                $payment_options = $sslc->makePayment($post_data, 'hosted');

                if (!is_array($payment_options)) {
                    print_r($payment_options);
                    $payment_options = array();
                }
            }
           return redirect()->route('company.current-plan')->with('error', 'Already using a plan');
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        $order_details = Order::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'currency', 'amount')->first();

          
        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) 
            {    
                 $update_order = Order::where('transaction_id', $tran_id)->first();
                 $update_order->status = 'Paid';
                 $update_order->update();

                return redirect()->route('company.current-plan')->with('success', 'Transaction is successfully Completed');
            }
        } 
        else if ($order_details->status == 'Paid') 
        {
                return redirect()->route('company.current-plan')->with('success', 'Transaction is successfully Completed');
        } 
        else 
        {
              return redirect()->route('company.current-plan')->with('error', 'Invalid Transaction');
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = Order::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') 
        {
            $update_order = Order::where('transaction_id', $tran_id)->first();
            $update_order->delete($update_order);

            return redirect()->route('company.current-plan')->with('error', 'Transaction is Falied');
        } 
        else if ($order_details->status == 'Paid') 
        {
            return redirect()->route('company.current-plan')->with('success', 'Transaction is already Successful');
        } 
        else
        {
            return redirect()->route('company.current-plan')->with('error', 'Invalid Transaction');
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        
        $order_details = Order::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending')
        {
            $update_order = Order::where('transaction_id', $tran_id)->first();
            $update_order->delete($update_order);
            return redirect()->route('company.current-plan')->with('error', 'Transaction is Cancel');
        }
        else if ($order_details->status == 'Paid')
        {
           return redirect()->route('company.current-plan')->with('success', 'Transaction is already Successful');
        }
        else
        {
            return redirect()->route('company.current-plan')->with('error', 'Invalid Transaction');
        }
    }

    public function ipn(Request $request)
    {
      
        if ($request->input('tran_id'))
        {

            $tran_id = $request->input('tran_id');
            $order_details = Order::where('transaction_id', $tran_id)->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending')
            {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE)
                {
                    $update_order = Order::where('transaction_id', $tran_id)->first();
                    $update_order->status = 'Paid';
                    $update_order->update();

                     return redirect()->route('company.current-plan')->with('success', 'Transaction is already Successful');
                }
            }
            else if ($order_details->status == 'Paid')
            {
                 return redirect()->route('company.current-plan')->with('success', 'Transaction is already Successful');
            }
            else
            {
                 return redirect()->route('company.current-plan')->with('error', 'Invalid Transaction');
            }
        } 
        else 
        {
            return redirect()->route('company.current-plan')->with('error', 'Invalid Data');
        }
    }
}
