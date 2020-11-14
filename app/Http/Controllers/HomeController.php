<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function checkAccountStatus(){
        if(Auth::user()->status==1){
            $user=User::find(Auth::user()->id);
            $subscription=Subscription::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get()[0];

            if(strtotime('now') > $subscription->subscription_expire){
                $user->status=0;
                $user->save();
            }

        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->checkAccountStatus();
        $expire='';
        if(Auth::user()->status==1){
            $subscription=Subscription::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get()[0];
            $expire=date("Y-m-d h:i:sa", strtotime('+6 hours',$subscription->subscription_expire));
        }
        return view('home',compact('expire'));
    }
}
