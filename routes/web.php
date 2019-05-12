<?php
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('welcome');
});

Route::get('/gentoken/{input}', function ($input) {
    $array = Array();
    $array['input'] = $input;
    $array['hash'] = Hash::make($input);
    return json_encode($array);
});

Route::get('/checkanswer/login', function () {
    return view('checkanswer.login');
});

Route::get('/checkanswer/download', 'CheckAnswerController@download');
Route::get('/checkanswer/profile', 'CheckAnswerController@profile');
Route::get('/checkanswer/answer', 'CheckAnswerController@answer');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@submit');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@processLogin');

Route::group(['middleware' => ['web', 'users']], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/home/personal', 'PersonalInformationController@index');
    Route::post('/home/personal', 'PersonalInformationController@submit');

    Route::group(['middleware' => ['checkProfile']], function () {
        Route::get('/home', 'HomeController@index');
        Route::get('/home/education', 'EducationInformationController@index');
        Route::post('/home/education', 'EducationInformationController@submit');

        Route::get('/home/location', 'LocationInformationController@index');
        Route::post('/home/location', 'LocationInformationController@submit');

        Route::get('/home/parent', 'ParentInformationController@index');
        Route::post('/home/parent', 'ParentInformationController@submit');

        Route::get('/home/camp', 'CampInformationController@index');
        Route::post('/home/camp', 'CampInformationController@submit');

        Route::get('/home/questions', 'QuestionsController@landing');
        Route::get('/home/questions/{id}', 'QuestionsController@showQuestion');
        Route::post('/home/questions/{id}', 'QuestionsController@submitQuestion');
    });
});