<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Referral;
use App\Admin;
use App\Manager;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
              $this->middleware('guest:admin');

    }
     public function showAdminRegisterForm()
   {
             $manager = Manager::where('id' , 1)->first();

       return view('admin.register')->with('manager',$manager);
   }
    protected function createAdmin(Request $request)
  {
      $admin = Admin::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => Hash::make($request['password']),
      ]);
      return redirect()->intended('login/admin');
  }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'address' => ['required', 'string', 'max:255'],
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    
     return User::create([
            'address' => $data['address'],
        ]);
    }

    public function signup(Request $request){
        $check = User::where('address',$request['address'])->first();
    if ($check) {
        
         return redirect()->back()->withErrors([
                'first_name' => 'This Wallet Address Already Store In Our Record.',
            ]);
        
    }


        $new = new User;
        $new->address = $request['address'];
        $new->save();

                     return redirect()->route('confirm');

    }

    public function getformsignupref($ref)
    {
              $manager = Manager::where('id' , 1)->first();

        return view('referralregister')->with('ref',$ref)->with('manager',$manager);
    }


        public function signupref(Request $request ,$ref){

        if ($ref) {

    $checkref = User::where('address',$ref)->first();
    $manager = Manager::where('id',1)->first();
    if ($checkref) {
         $check = User::where('address',$request['address'])->first();
    if ($check) {
         return redirect()->back()->withErrors([
                'first_name' => 'This Wallet Address Already Store In Our Record.',
            ]);
    }
     $new = new User;
        $new->address = $request['address'];
        $new->save();

        $pick_id_of_ref = $checkref->id;
        $pick_id_of_makeaccount = $new->id;
        $new_referral_record = new Referral;
        $new_referral_record->pick_id_of_makeaccount = $pick_id_of_makeaccount;
        $new_referral_record->pick_id_of_ref = $pick_id_of_ref;
        $new_referral_record->save();
        $pick_bal_of_ref = $checkref->balance;
        $make_profit_of_ref = $pick_bal_of_ref + $manager->referral_bonus;

        $update_bal_of_ref_user = User::where('id',$pick_id_of_ref)->update(['balance' => $make_profit_of_ref]);
                      return redirect()->route('confirm');

    }else{
        return redirect()->back()->withErrors([
                'first_name' => 'Your Referral Link Address Not Found In Our Record.',
            ]);
    }


        }
    $check = User::where('address',$request['address'])->first();
    if ($check) {
         return redirect()->back()->withErrors([
                'first_name' => 'This Wallet Address Already Store In Our Record.',
            ]);
        
    }
        $new = new User;
        $new->address = $request['address'];
        $new->save();

                     return redirect()->route('confirm');

    }
}


