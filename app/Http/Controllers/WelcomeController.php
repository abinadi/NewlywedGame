<?php namespace Newlywedgame\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Newlywedgame\Http\Requests\LoginUserRequest;
use Newlywedgame\Question;
use Newlywedgame\User;

class WelcomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @param User $user
	 * @return Response
	 */
	public function index(User $user)
	{
		$users = $user->orderBy('name')->get();

		return view('choose')->with(compact('users'));
	}

	public function login(LoginUserRequest $request)
	{
		// Login
		Auth::loginUsingId($request->user_id);

		// Redirect to the questions
		return redirect('/question');
	}

	public function auto_login($id)
	{
		Auth::loginUsingId($id);

		// If the user has not submitted at least two questions, send them to the create a question page
		$question_count = Question::where('user_id',$id)->count();

		if( $question_count < 2 ) {
			return redirect('/question/create');
		}

		return redirect('/question');
	}
}
