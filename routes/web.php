<?php

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
    $tasks = DB::table('tasks')->get();

    //Below returns formatted array 
    return view('welcome', compact('tasks'));
       
    //Below will return native JSON format
    //return $tasks;
});

Route::get('/blog', 'BlogController@index');
Route::post('/blog', 'BlogController@store');
Route::get('/blog/create', 'BlogController@create');
Route::get('/blog/{post}', 'BlogController@show');
Route::post('/blog/{post}/comments', 'CommentsController@store');

Route::get('/widgets', 'WidgetsController@index');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/about', function() {
    return view('about');
});

//below routes uses a Controller, see basic examples below these 
Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');

//below routes use basic flows, see other examples above
//Route::get('/tasks', function() {
    //Below uses Laravel Query Builder
    //$tasks = DB::table('tasks')->latest()->get();

    //Below uses Eloquent & prior created 'Task' model using artisan make:model
    //$tasks = App\Task::all();

    //return view('tasks/index', compact('tasks'));
//});

//Route::get('/tasks/{task}', function($id) {

   //Below is Laravel Query Builder
   //$task = DB::table('tasks')->find($id);
   //Below is Eloquent
   //$task = App\Task::find($id);

   //dd($task); this is a helper function: "dump & die"
    
    //return view('tasks/show', compact('task'));
//});
Auth::routes();

Route::get('/home', 'HomeController@index');
