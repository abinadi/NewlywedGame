<?php namespace Newlywedgame\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Newlywedgame\Http\Requests\Request;

class CreateQuestionRequest extends Request {

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
			'for_husband'	=> 'required',
			'for_wife'		=> 'required'
		];
	}

}
