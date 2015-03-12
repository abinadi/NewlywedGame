<?php namespace Newlywedgame\Http\Controllers;

use Newlywedgame\Http\Requests;
use Newlywedgame\Http\Controllers\Controller;

use Newlywedgame\Question;
use Newlywedgame\Result;
use Newlywedgame\User;

class ReconcileController extends Controller {
	protected $total;

	public function __construct()
	{
		//$this->middleware('auth');

		$this->total = Question::all()->count();
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function index($id = 1)
	{
		$husbands = User::with('spouse')
						->with(['answers'=>function($query) use($id) {
							$query->where('question_id',$id);
						}])
						->where('gender','male')
						->orderBy('name')
						->get();

		$question = Question::find($id);

		return view('reconcile')->with(compact('husbands','question'));
	}

	public function reconcile()
	{
		$qid = intval(\Request::input('question_id'));

		$husbands = User::with('spouse')->orderBy('id')->get();

		foreach( $husbands as $husband ) {
			if(\Request::has($husband->id)) {
				if (\Request::input($husband->id) == '1') {
					$match = true;
				} else {
					$match = false;
				}

				$data = [
					'husband_id' => $husband->id,
					'wife_id' => $husband->spouse->id,
					'question_id' => $qid,
					'match' => $match
				];

				// What if this combo already exists? No recreating it, please.
				$result = Result::where('husband_id',$husband->id)->where('question_id',$qid)->first();

				if( count($result) < 1 ) {
					Result::create($data);
				} else {
					$result->match = $match;
					$result->save();
				}
			}
		}

		return redirect($this->next($qid));
	}

	public function results()
	{
		$hids = Result::where('match',true)->groupBy('husband_id')->orderBy('total_matches','desc')->get(['husband_id',\DB::raw('count(*) as total_matches')]);

		return view('results')->with(compact('hids'));
	}

	private function next($id)
	{
		$next = '/reconcile/' . ($id + 1);

		if ($this->total == $id) {
			// on the last question, next up is results page
			$next = '/results';
		}

		return $next;
	}
}
