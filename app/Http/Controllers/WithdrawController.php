<?php

namespace App\Http\Controllers;
use App\Withdraw;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class WithdrawController extends Controller
{
    public function store(Request $request)
    {
      
        $rules = array(
            'name'    =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'        =>  $request->name,
            'userid'         =>  $request->userid,
            'action1'         =>  $request->action1
        );

        Withdraw::create($form_data);

        return response()->json(['success' => 'successfully.']);

        
    }
    
   public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Withdraw::where('userid' , auth()->user()->id)->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                    })
                    ->make(true);
        }
        return view('home');
    }
}
