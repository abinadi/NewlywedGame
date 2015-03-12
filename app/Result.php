<?php namespace Newlywedgame;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {
	protected $table = 'results';

	protected $fillable = ['husband_id', 'wife_id', 'question_id', 'match'];

	public function question()
	{
		return $this->belongsTo('\Newlywedgame\Question');
	}

	public function husband()
	{
		return $this->belongsTo('\Newlywedgame\User', 'id', 'husband_id');
	}

	public function wife()
	{
		return $this->belongsTo('\Newlywedgame\User', 'id', 'wife_id');
	}
}
