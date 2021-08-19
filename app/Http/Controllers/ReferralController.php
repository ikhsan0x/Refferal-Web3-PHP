<?php

namespace App\Http\Controllers;
use App\Manager;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
              $manager = Manager::where('id' , 1)->first();

        return view('welcome')->with('manager',$manager);
    }
    public function fall()
    {
              $manager = Manager::where('id' , 1)->first();

        return view('fall')->with('manager',$manager);
    }
}
