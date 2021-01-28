<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expert;
use App\Models\Question;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Mail\ExpertApply;
use App\Mail\CoverRisks;
use App\Mail\RisksAdmin;

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

    /* Questions */
    public function questions() {
        $questions =  Question::with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
        return response()->json([
			'status' => 'success', 
            'data' => $questions,
		]);
    }
    public function post_question(Request $request) {
		$user  = User::find($request->user)->first();
        $users = User::where('category', 'like', '%' . $request->category . '%')->get();
        
		$question = new Question;
		$question->user_id = $request->user;
		$question->question = $request->question;
		$question->category = $request->category;
		// $question->posted = Carbon::now()->format('M j');
		if ($request->anonymous) {
			$question->anonymous = true;
		}
		$question->save();
		
		$questions = Question::with(['user', 'comments.user'])->orderBy('id', 'desc')->get();

		// Send mail to all interested users
		// if (!empty($users)) {
		//     $today = Carbon::now()->format('M j');
		
		//     foreach ($users as $data) {
		//         if ($data->id !== $request->user) {
		// 	        Mail::send('emails.questions', [
		// 	            'today' => $today, 
		// 	            'user' => $user, 
		// 	            'data' => $data, 
		// 	            'question' => $request->question,
		// 	            'anonymous' => $request->anonymous
		// 	        ], function ($message) use ($request, $data) {
		// 	            $message->from('noreply@askinsurpedia.com', 'AskInsurpedia')->to($data->email, $data->fname .' '. $data->lname)->subject('New Question on AskInsurpedia');
		// 	        });
		//         }
		
		//     }
		// };
		
		return response()->json([
			'status' => 'success', 
			'data' => $questions
		]);

    }
    
    // Reply to a question
    public function post_comment(Request $request) {
        $comment = new Comment;
		$comment->user_id = $request->user;
		$comment->question_id = $request->question;
		$comment->comment = $request->comment;
		$comment->save();
		
		$question = Question::with(['user'])->where('id', $request->question)->get();
		$answer = Comment::with(['user'])->where('id', $comment->id)->get();
		
		$data = [
		    'today' => Carbon::now()->format('M j'),
		    'question' => $question,
		    'answer' => $answer
		];
		
		// Mail::send('emails.answered', ['data' => $data], function ($message) use ($data) {
		// 	            $message->from('noreply@askinsurpedia.com', 'AskInsurpedia')
		// 	            ->to($data['question'][0]->user->email, $data['question'][0]->user->fname)
		// 	            ->subject('New answer to your question.');
		// 	        });
		
        $questions = Question::with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
        
        return response()->json([
			'status' => 'success', 
			'data' => $questions
		]);
    }

    // Articles
    public function articles() {
        $articles = Article::all();
        return response()->json([
			'status' => 'success', 
			'data' => $articles
		]);
    }

    public function experts() {
        $experts = Experts::all();
        return response()->json([
			'status' => 'success', 
			'data' => $experts
		]);
    }
    
    /* 

        Settings
    
    */

    public function settings_password() {

    }

    // Change user Photo
    public function settings_photo(Request $request) {
        $user = User::find($request->user_id);
		$user->photo = "data:image/png;base64, " . $request->photo;
		$user->save();

		return response()->json([
			'status' => 'success', 
            'data' => $user,
		]);
    }

    // Update user category
    public function settings_category() {
        $user = User::find($request->user_id);
		$user->category = $request->category;
		$user->save();

		return response()->json([
			'status' => 'success', 
			'data' => $user
		]);
    }
    public function settings_category_update() {}

    // Cover my risks enquiry
    public function settings_risks(Request $request) {
        $data = [
			'name'      => $request->name,
			'risks'     => $request->risks,
			'phone'     => $request->phone,
			'email'     => $request->email,
			'contact'   => $request->contact
		];
        
        Mail::to('me@sprypixels.com')->send(new RisksAdmin($data));
        Mail::to('me@sprypixels.com')->send(new CoverRisks($data));
		
		return response()->json(['status' => 'success']);
    }

    // Expert Application
    public function settings_expert(Request $request) {
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
