<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referral;
use App\Manager;
use App\Withdraw;


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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
              $manager = Manager::where('id' , 1)->first();
      $reftotal     = Referral::where('pick_id_of_ref' , auth()->user()->id)->count();
      $withdraw = Withdraw::where('userid' , auth()->user()->id)->sum('name');

        $ref_get = Referral::with('user')->where('pick_id_of_ref' ,auth()->user()->id)->get();
        return view('home')->with('ref_get' ,$ref_get)->with('manager',$manager)->with('reftotal',$reftotal)->with('withdraw',$withdraw);
    }
    public function returnUser(){
    $user = Auth::user()->address;
    Javascript::put([ 'user.address' => $user ]);
    return view('public.example');
}
}
