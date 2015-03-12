<?php namespace Newlywedgame;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'locked_in', 'spouse_id', 'gender'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function questions()
	{
		return $this->hasMany('\Newlywedgame\Question');
	}

	public function answers()
	{
		return $this->hasMany('\Newlywedgame\Answer');
	}

	public function husbands()
	{
		return $this->hasMany('\Newlywedgame\Result', 'husband_id', 'id');
	}

	public function wives()
	{
		return $this->hasMany('\Newlywedgame\Result', 'wife_id', 'id');
	}

	public function spouse()
	{
		return $this->belongsTo('\Newlywedgame\User', 'spouse_id', 'id');
	}
}
