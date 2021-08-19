<?php

namespace App\Http\Controllers;
use App\User;
use App\Admin;
use App\Withdraw;
use App\Manager;
use App\Referral;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth:admin');
  }
  // adminfunction

  public function index()
  {
      $user     = User::all()->count();
      $balance  = User::sum('balance');
      $withdraw = Withdraw::sum('name');
      $manager = Manager::where('id' , 1)->first();
      $ref_get = Referral::get();

      return view('admin.home')->with('ref_get' ,$ref_get)->with('withdraw',$withdraw)->with('balance',$balance)->with('user',$user)->with('manager',$manager);
  }
  
  public function getuser()
  {
      $user = User::orderBy('id', 'DESC')->paginate(50);
           $manager = Manager::where('id' , 1)->first();

      return view('admin.user')->with('user',$user)->with('manager',$manager);;
  }
   public function getwithdraw()
  {
      $withdraw = Withdraw::with('user')->orderBy('id', 'DESC')->paginate(50);
           $manager = Manager::where('id' , 1)->first();

      return view('admin.withdraw')->with('withdraw',$withdraw)->with('manager',$manager);;
  }
    public function confirmwith($id)
  {
            $withdrawbal = Withdraw::where('id' ,$id)->first();
     $ueridd = $withdrawbal->userid;
     $getbal = User::where('id' ,$ueridd)->first();
     $getbaluser = $getbal->balance;
     $minuswithdraw = $getbaluser - $withdrawbal->name; 
     $withdrawbaladd = $getbal->withdraw + $withdrawbal->name; 
     $update = User::where('id' ,$ueridd)->update(['balance' => $minuswithdraw , 'withdraw' => $withdrawbaladd]);
      
      $withdraw = Withdraw::where('id' ,$id)->update(['action1' => "confirm"]);
     
      return redirect()->back();
  }
    public function rejectwith($id)
  {
      $withdraw = Withdraw::where('id' ,$id)->update(['action1' => "reject"]);
     
      return redirect()->back();
  }
  public function manager()
  {
    $manager = Manager::where('id' , 1)->first();

      return view('admin.manager')->with('manager',$manager);
  }
  public function managerstore(Request $request)
  {
          $manager = Manager::where('id' , 1)->first();
      if($request->file('logo')){
     if($request->hasFile('logo')){
          $image = $request->file('logo');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $request->logo->move(public_path('/assets/img/brand/'), $filename);
     }
      $Managersave = Manager::where('id' ,1)->update(['website_title' => $request['website_title'],'minimum_withdraw' => $request['minimum_withdraw'],
     'referral_bonus' => $request['referral_bonus'],'currency_name' => $request['currency_name'],'logo' => $filename]);
     
      return redirect()->back();
     
}else{
     
     $Managersave = Manager::where('id' ,1)->update(['website_title' => $request['website_title'],'minimum_withdraw' => $request['minimum_withdraw'],
     'referral_bonus' => $request['referral_bonus'],'currency_name' => $request['currency_name'],'logo' => $manager->logo]);
     
      return redirect()->back();
  }
}

}
