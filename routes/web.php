<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', 'Page\HomeController@index');

// Message Submission
Route::put('message', 'Auth\SubmitMessageController@submitMessage');
