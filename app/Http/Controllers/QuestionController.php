<?php namespace Newlywedgame\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Newlywedgame\Answer;
use Newlywedgame\Http\Requests;
use Newlywedgame\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Newlywedgame\Http\Requests\CreateQuestionRequest;
use Newlywedgame\Http\Requests\LockRequest;
use Newlywedgame\Question;
use Newlywedgame\User;

class QuestionController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param null $id
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function index($id = NULL)
	{
		// If there is no $id, what question should we go to?
		if( is_null($id) ) {
			$id = $this->lowestUnfinished();

			if( is_null($id) ) {
				return redirect('/review');
			}

			return redirect('/question/'.$id);
		}

		$question = Question::find($id);
		if(empty($question)) {
			return redirect('/review');
		}

		$answer = Answer::where('user_id',\Auth::user()->id)->where('question_id',$id)->first();

		$questions = Question::all(['id']);
		$total = count($questions);

		return view('question')->with(compact('question','total','questions','answer'));
	}

	public function create()
	{
		return view('create_question');
	}

	/**
	 * @param CreateQuestionRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateQuestionRequest $request)
	{
		$data = array_merge($request->all(), ['user_id' => \Auth::user()->id]);

		Question::create($data);

		return redirect('/question/create')->with('message','Question created');
	}

	/**
	 * @return $this
	 */
	public function review()
	{
		$questions = Question::with(['answer' => function($query) {
			$query->where('user_id', \Auth::user()->id);
		}])->get();

		$status = $this->answered_all_questions();

		$locked = Auth::user()->locked_in;

		return view('review')->with(compact('questions','status','locked'));
	}

	/**
	 * @param LockRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function lock(LockRequest $request)
	{
		$user = Auth::user();

		$user->locked_in = true;

		$user->save();

		return redirect('/review');
	}

	/**
	 * @return null
	 */
	private function lowestUnfinished()
	{
		$questions = Question::all();

		foreach($questions as $question) {
			$answer = Answer::where('user_id', \Auth::user()->id)->where('question_id', $question->id)->get();

			if (count($answer) < 1) {
				return $question->id;
			}
		}

		return null;
	}

	/**
	 * @return bool
	 */
	private function answered_all_questions()
	{
		$questions = Question::all()->count();

		$answers = Answer::where('user_id', \Auth::user()->id)->count();

		return $questions == $answers;
	}
}
