<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('husband_id')->unsigned();
			$table->integer('wife_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->boolean('match');
			$table->timestamps();

			$table->foreign('husband_id')
					->references('id')->on('users');

			$table->foreign('wife_id')
					->references('id')->on('users');

			$table->foreign('question_id')
					->references('id')->on('questions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('results');
	}

}
