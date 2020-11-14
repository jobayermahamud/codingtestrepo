<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Subscription;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function checkoutUser(){
        return view('checkout');
    }
    public function activateUser(Request $request){
        Stripe::setApiKey('sk_test_51Hn97WJEfHAaOKZ1QARWdEh8LuGdKwjmja1CUa56MIiLWed71zImCPjk3YNIUa9bb561YfD38CQNDFvb6oWznRbM00P5qqZjwX');
        header('Content-Type: application/json');
        $YOUR_DOMAIN = url('/');
        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'unit_amount' =>1000,
            'product_data' => [
                'name' => 'Monthly subscription',
                
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' =>url('success'),
        'cancel_url' =>url('cancel')
        ]);
        return json_encode(['id' => $checkout_session->id]);
        //return "Hellow";

    }


    public function successSubscription(){
        $user=User::find(Auth::user()->id);
        $user->status=1;
        $user->save();
         
        $subscription=new Subscription;
        $subscription->user_id=$user->id;
        $subscription->paid_at=strtotime('now');
        $subscription->subscription_expire=strtotime("+30 days");
        $subscription->save();
        return redirect('home');
    }

    public function cancelSubscription(){
        return 'Cancel';
    } 

    public function monthlyReport(){
        $subscription=User::find(Auth::user()->id)->subscriptions;//Subscription::where('user_id',Auth::user()->id)->get();
        return view('report',compact('subscription'));
    }
}
