<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

//Landing Page
Route::get('/', function () {
    return view('welcome');
});

//minimum user / logged in user
Route::group(['middleware' => ['level:1']], function () {
    //minimum Teacher
    Route::group(['middleware' => ['level:4']], function () {
        Route::group(['middleware' => ['level:5']], function () {
        });
        Route::resource('courses', 'CoursesController');
        Route::resource('courses.assignments', 'AssignmentController');
        Route::resource('courses.assignments.handin','HandinController');
        Route::resource('courses.assignments.handin.grade','GradeController');
        Route::get('courses/{course}/assignments/{assignment}/handin/{handin}/download','HandinController@downloadhandin')->name('course.assignments.handin.download');
        Route::resource('video','VideoController');
        Route::resource('users', 'UserController');

    });

    Route::resource('dashboard', 'DashboardController');

    Route::resource('forum', 'ForumController', ['except' => ['show']])->parameters(['forum' => 'category']);
    Route::resource('forum.topic', 'ForumTopicController')->parameters(['forum' => 'category']);
    Route::resource('forum.topic.post', 'ForumTopicPostController')->parameters(['forum' => 'category']);

    Route::resource('courses', 'CoursesController', ['only' => ['index']]);

    Route::resource('courses.assignments', 'AssignmentController', ['only' => ['index','show']]);
    Route::resource('courses.assignments.handin','HandinController', ['only' => ['create','store']]);

    Route::get('courses/{course}/assignments/{assignment}/handin/{handin}/download','HandinController@downloadhandin')->name('course.assignments.handin.download');

    Route::resource('profile', 'ProfileController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('contact','ContactController');
    Route::post('search', 'DashboardController@search')->name('search');

    Route::resource('videos', 'VideoController');

    //botman routes
    Route::match(['get', 'post'], '/botman', 'BotManController@handle');
});


