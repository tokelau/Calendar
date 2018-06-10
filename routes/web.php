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

use Illuminate\Http\Request;

//Route::get('/', 'TaskController@index');

Route::post('/', function (Request $request) {
	// $validator = Validator::make($request->all(), [
	// 	'topic' => 'requred|max:50',
	// 	'comment' => 'max:65535',
	// 	'place' => 'max:50'
	// ]);

	// if ($request->fail()) {
	// 	return redirect('/')
	// 		->withInput()
	// 		->withErrors($validator);
	// }

	$task = new App\Task;
	//$task-> //метод для присваивания полей $task->field = $request->field
	$task->Infill($request);
	//$task->topic = $request->topic;
	//echo ($task->topic);
	$task->save();

	return redirect('/');
});

Route::get('/', function () {
	$tasks = App\Task::all();
    //return view('default', compact($tasks));
    return view('default', [
    	'tasks' => $tasks,
    ]);
});

// Route::delete('/task/{task}')
