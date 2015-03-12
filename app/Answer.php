<?php namespace Newlywedgame;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	protected $table = 'answers';

	protected $fillable = ['user_id', 'answer', 'question_id'];

	public function user()
	{
		return $this->belongsTo('\Newlywedgame\User');
	}

	public function question()
	{
		return $this->belongsTo('\Newlywedgame\Question');
	}
}
