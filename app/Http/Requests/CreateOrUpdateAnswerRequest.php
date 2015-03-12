<?php namespace Newlywedgame\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Newlywedgame\Http\Requests\Request;

class CreateOrUpdateAnswerRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'question_id'	=> 'required|numeric|integer|exists:questions,id',
			'answer'		=> 'required'
		];
	}

}
