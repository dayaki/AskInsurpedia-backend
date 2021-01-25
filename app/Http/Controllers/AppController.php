<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller {

    /* 

        Email Auth
    
    */
    
	public function signup(Request $request) {
	    $user = User::where('email', $request->email)->get();
	    
	    if (count($user) > 0) {
			return response()->json([
                'status' => 'exist',
                'message' => "Email address is already in use."
			], 200);

		} else {
		    $user = new User;
            $user->fname    = $request->fname;
            $user->lname   	= $request->lname;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);  
		    $user->save(); 
		
		    Auth::login($user);
		    return response()->json([
			    'status' => 'success',
			    'data' => Auth::user()
		    ], 200);
		}
		
    }

	public function login(Request $request) {
		if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
			return response()->json([
				'status' => 'success',
				'data' => Auth::user()
			]);
		} else {
			return response()->json(['status' => 'error', 'message' => 'Invalid email address or password']);
		}
	}
    
}
