<?php namespace Newlywedgame\Http\Requests;

use Newlywedgame\Http\Requests\Request;

class LoginUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id' => 'required|numeric|integer|exists:users,id'
		];
	}

}
