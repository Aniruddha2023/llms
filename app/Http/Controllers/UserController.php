<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id){

  
        $user = User::find($id);


        return view('panel.user-profile');
    }

    public function update(Request $request){
        
        $validator = \Validator::make($request->all(),[
            'user_id'       => 'required',
			'username'		=> 'required',
			'email'		    => 'required',
			'password'  	=> 'required|confirmed',
			
			
			
	 ],[
         'user_id.required'=>'*User ID is required',
		 'username.required'=>'*Username is required',
		 'email.required'=>'*Email name is required',
		 'password.required'=>'*Password is required',
		 'password.confirmed'=> '*Password and Cofirm Password do not match',
	 ]);

	 if(!$validator->passes()){
		return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
	}else{
        $user = User::find($request->user_id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password'=>$request->password
        ]);
		return response()->json(['code'=>1, 'message' => 'Profile Update Successfully']);
    }  
   
    }
}
