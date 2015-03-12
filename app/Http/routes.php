<?php

Route::get('/', 'WelcomeController@index');

Route::post('login', 'WelcomeController@login');
Route::get('l/{id}', 'WelcomeController@auto_login');

Route::get('question/create', 'QuestionController@create');
Route::get('question/{id?}', 'QuestionController@index');
Route::post('question', 'QuestionController@store');

Route::post('answer', 'AnswerController@store');
Route::put('answer', 'AnswerController@update');

Route::get('review', 'QuestionController@review');
Route::post('review', 'QuestionController@lock');

Route::get('reconcile/{id?}', 'ReconcileController@index');
Route::post('reconcile', 'ReconcileController@reconcile');

Route::get('results', 'ReconcileController@results');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
