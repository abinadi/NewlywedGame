<?php namespace Newlywedgame;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	protected $table = 'questions';

	protected $fillable = ['for_husband', 'for_wife', 'user_id'];

	public function user()
	{
		return $this->belongsTo('\Newlywedgame\User');
	}

	public function answer()
	{
		return $this->hasMany('\Newlywedgame\Answer');
	}

	public function result()
	{
		return $this->hasMany('\Newlywedgame\Result');
	}
}
