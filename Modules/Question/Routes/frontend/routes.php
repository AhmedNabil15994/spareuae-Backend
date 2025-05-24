<?php

use Illuminate\Support\Facades\Route;
use Modules\Question\Entities\Question;

Route::get('questions/{id}', 'QuestionController@show')->name('frontend.questions.show');
Route::post('questions/ask-question', 'QuestionController@askQuestion')->name('frontend.questions.ask-question');
