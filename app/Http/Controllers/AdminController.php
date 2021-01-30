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

class AdminController extends Controller {
    
    // Auth
    public function login() {
        return view('admin/login');
    }
    public function login_post(Request $request) {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_admin' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ]);
    }

    // Dashboard
    public function dashboard() {
        // return view('admin/dashboard');
        return redirect()->route('questions');
    }

    public function questions() {
        $questions = Question::with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
		return view('admin.questions')->with(['questions' => $questions]);
    }
    public function questions_answered() {
        $questions = Question::has('comments')->with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
		return view('admin.an-questions')->with(['questions' => $questions,]);
    }
    public function questions_unanswered() {
        $questions = Question::has('comments', '=', 0)->with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
        return view('admin.un-questions')->with(['questions' => $questions]);
        
    }

	public function questions_un() {
		$questions = Question::has('comments', '=', 0)->with(['user', 'comments.user'])->orderBy('id', 'desc')->get();
		return view('admin.questions')->with(['questions' => $questions, 'unanswered' => true]);
	}
    
    public function question_view($id) {
        $question = Question::find($id);
        return view('admin.view-question')->with(['question' => $question]);
    }
}
