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

    /*
	
		Questions
		
	*/
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
    public function question_view($id) {
        $question = Question::find($id);
        return view('admin.view-question')->with(['question' => $question]);
    }

    /*
	
		Articles
		
	*/
	public function articles() {
		$articles = Article::all();
		return view('admin.articles')->with(['articles' => $articles]);
	}

	public function new_article() {
		return view('admin.new-article');
	}

	public function new_article_post(Request $request) {
		request()->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $request->image->store('uploads', 'public');
        $fileUrl = "http://127.0.0.1:8000/storage/uploads/" . $request->image->hashName();

		$article = new Article;
		$article->title = $request->title;
		$article->content = $request->content;
		$article->image = $fileUrl;
		$article->save();

		return redirect()->route('admin.articles')->with('success', 'Article published successfully...');
    }
    
    public function view_article($id) {
        $article = Article::find($id);
		return view('admin.view-article')->with(['article' => $article]);
    }   

	public function edit_article($id) {
		$article = Article::find($id);
		return view('admin.edit-article')->with(['article' => $article]);
	}

	public function edit_article_post(Request $request) {
		$article = Article::find($request->articleID);
		$article->title = $request->title;
		$article->content = $request->content;
		if ($request->image) {
            $request->image->store('uploads', 'public');
            $fileUrl = "http://127.0.0.1:8000/storage/uploads/" . $request->image->hashName();
			$article->image = $fileUrl;
		}
		$article->Save();

		return redirect()->route('articles')->with('success', 'Article edited successfully...');
	}
	public function delete_article($id) {
        $article = Article::find($id)->delete();
		return redirect()->route('admin.articles');
    }

    /*
	
		Users
		
	*/

	public function users() {
		$users = User::where('is_admin', false)->where('is_expert', false)->get();
		return view('admin.users')->with(['users' => $users]);
	}

	public function user_delete($id) {
        $user = User::find($id);
        if (!$user->is_admin && !$user->is_expert) {
            $user->delete();
        }

        return redirect()->route('admin.users');
		
	}



}
