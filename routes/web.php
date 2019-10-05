<?php
//use Illuminate\Filesystem\Filesystem;
//use App\Services\Twitter;
use App\Repositories\UserRepository;
//bind example into service container
//when fetching out example we want to return a new instance of example class
//bind will return different instances of example for each call
// app()->bind('example', function(){
//     return new \App\Example;
// });
//for single instance
// app()->singleton('App\Services\Twitter', function(){
//     return new \App\Services\Twitter('A Gay String');
// });

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

Route::get('/', function (UserRepository $users) {
    //fetch out of container
        //dd(app('example'));
    //with no service container laravel will look for anythng as App\Example
    //in example constructor it sees example is being constructed with foo
    //looks for foo class and passes it in
    //if foo had own constructor it will continue cycle until it returns what you want
    //dd(app('App\Example'));
    //dd(app('october'));
    dd($users);
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

// Route::get('/projects', 'ProjectsController@index');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::patch('/projects/{project}', 'ProjectsController@update');

// Route::delete('/projects/{project}', 'ProjectsController@destroy');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completedTasks/{task}', 'CompletedTasksController@store');
Route::delete('/completedTasks/{task}', 'CompletedTasksController@destroy');
