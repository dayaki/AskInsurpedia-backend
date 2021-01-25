<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expert;
use App\Models\Question;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Mail\ExpertApply;

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
    
    /* 

        Settings
    
    */

    public function settings_password() {

    }

    public function settings_photo() {}
    public function settings_category() {}
    public function settings_category_update() {}
    public function settings_risks() {}
    
    // Expert Application
    public function settings_expert() {
        $expert = new Expert;
        $expert->user_id = $request->user_id;
        $expert->bio = $request->bio;
        $expert->specialty = $request->specialty;
        $expert->experience = $request->experience;
        $expert->consultant = $request->consultant;
        $expert->save();

        $data = [
			'name'          => $request->name,
			'specialty'     => $request->specialty,
			'experience'    => $request->experience,
			'consultant'    => $request->consultant,
			'bio'   	    => $request->bio
        ];
        
        Mail::to('me@sprypixels.com')->send(new ExpertApply($data));
		
		// Mail::send('emails.be-expert', ['data' => $data ], function ($message) use ($request) {
		// 	$message->from('no-reply@askinsurpedia.com', 'AskInsurpedia')
		// 		->to('expert@askinsurpedia.com')
		// 		->subject('Be an Expert Applicant');
		// });
		
		return response()->json(['status' => 'success']);
    }
    
}
