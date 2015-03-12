<?php namespace Newlywedgame\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Newlywedgame\Answer;
use Newlywedgame\Http\Requests;
use Newlywedgame\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Newlywedgame\Http\Requests\CreateOrUpdateAnswerRequest;

class AnswerController extends Controller {
	protected $is_locked;

	public function __construct()
	{
		$this->middleware('auth');
		$this->is_locked = Auth::user()->locked_in;
	}

	public function store(CreateOrUpdateAnswerRequest $request)
	{
		if( ! $this->is_locked) {
			$data = array_merge($request->all(), ['user_id' => \Auth::user()->id]);
			Answer::create($data);
		}

		$next_id = $request->question_id + 1;

		return redirect('question/'.$next_id);
	}

	public function update(CreateOrUpdateAnswerRequest $request)
	{
		if( ! $this->is_locked) {
			$answer = Answer::where('user_id', \Auth::user()->id)->where('question_id', $request->question_id)->first();

			$answer->answer = $request->answer;

			$answer->save();
		}

		$next_id = $request->question_id + 1;

		return redirect('/question/'.$next_id);
	}
}
