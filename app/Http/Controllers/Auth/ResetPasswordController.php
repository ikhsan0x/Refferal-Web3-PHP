<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // public function resetaddress()
    // {
    //     return view('auth.passwords.email');
    // }

    // public function resetaddresssave(Request $request)
    // {
    //     $id = $request['id'];
    //     $address = $request['address'];
    //     $pass_check = User::where('id' , $id)->first();
    //     if ($pass_check) {
    //          return redirect()->back()->withInput($request->only('id'))->withErrors([
    //             'id' => 'We could not find you in our database.',
    //         ]);
    //     }else{
    //         $update_pass = User::where('id',$id)->update(['address' => $address]);
    //          return redirect()->back()->withInput($request->only('id'))->withErrors([
    //             'first_name' => 'We update you in our database.',
    //         ]);
    //     }
    // }
}
