<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::post('recorder', 'AudioController@recorder');


Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('group')->middleware('auth.teacher')->group(function(){
        Route::get('','GroupController@index');
        Route::post('add','GroupController@store');
        Route::get('edit/{id}','GroupController@edit');
        Route::get('delete/{id}','GroupController@destroy');
        Route::post('update/{id}','GroupController@update');
    });
    Route::prefix('lesson')->middleware('auth.teacher')->group(function(){
        Route::get('','LessonController@index');
        Route::post('add','LessonController@store');
        Route::get('edit/{id}','LessonController@edit');
        Route::get('delete/{id}','LessonController@destroy');
        Route::post('update/{id}','LessonController@update');
        Route::get('search/{id}','LessonController@search');
    });
    Route::get('homeworks','HomeworkController@index');
    Route::post('update/rating/{id}','HomeworkController@rating');

    Route::prefix('groupUsers')->middleware('auth.teacher')->group(function(){
        Route::get('','GroupUserController@index');
        Route::post('add','GroupUserController@store');
        Route::get('edit/{id}','GroupUserController@edit');
        Route::get('delete/{id}','GroupUserController@destroy');
        Route::post('update/{id}','GroupUserController@update');
        Route::get('search/{id}','GroupUserController@search');
    });
    Route::prefix('student')->group(function(){
        Route::get('/posts','student\PostController@index');
        Route::post('/posts/add','student\PostController@store');
        Route::post('/comment/add/{id}','student\CommentController@store');
        Route::get('/delete/comment/{id}','student\CommentController@destroy');

    });
    Route::prefix('profiles')->group(function(){
        Route::get('/student/{id}','ProfileController@show');
        Route::get('/edit/','ProfileController@index');
        Route::post('/update/{id}','ProfileController@update');


    });
    Route::get('/delete/picture/','ProfileController@destroy');

    Route::prefix('user')->group(function(){
        Route::get('/edit/{id}','ProfileController@edit');
        Route::get('/groups','UserGroupsController@index');
        Route::get('/lessons','student\UserLessonsController@index');
        Route::get('/lessons/{id}','student\UserLessonsController@show');

    });
    Route::prefix('like')->group(function(){
        Route::get('/add/{id}','LikeController@add');
        Route::get('/dislike/{id}','LikeController@dislike');
    });
    Route::get('users', 'teacher\UserController@index');
    Route::post('/send/message/{id}', 'NotificationController@store');
    Route::get('/make/teacher/{id}', 'teacherController@makeTeacher');
    Route::get('employment', 'EmploymentController@index');
    Route::get('chat', 'ChatController@index');



});
