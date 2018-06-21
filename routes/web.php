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
use \Carbon\Carbon;

Route::get('/', function () {
	$tasks = $tasks = App\Task::where('date', '>=', now())
                    ->orderBy('date')
                    ->get();
    return view('default', [
    	'tasks' => $tasks,
    	'toShow' => 'add'
    ]);
});

Route::get('/{orderType}', function ($orderType) {
   	$tasks = [];
	switch ($orderType) {
		case 'overdue':
			$tasks = App\Task::where('date', '<', now())
                    ->orderBy('date')
                    ->get();

			break;
		case 'current':
			$tasks = App\Task::where('date', '>=', now())
                    ->orderBy('date')
                    ->get();

			break;
		case 'today':
			$tasks = App\Task::where('date', '>=', Carbon::today())
					->where('date', '<=', Carbon::tomorrow())
                    ->orderBy('date')
                    ->get();

			break;
		case 'tomorrow':
			$tasks = App\Task::where('date', '>=', Carbon::tomorrow())
					->where('date', '<=', Carbon::tomorrow()->addDay(1))
                    ->orderBy('date')
                    ->get();

			break;
	}
	return view('default', [
    	'tasks' => $tasks,
    	'toShow' => 'list'
    ]);
});

Route::post('/', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'topic' => 'required|max:255',
    'comment' => 'max:255'
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $task = new App\Task;
  $task->Infill($request);
  $task->save();

  return redirect('/');
});

Route::delete('/task/{task}', function (App\Task $task) {
  $task->delete();

  return redirect('/');
});

Route::get('/task/{task}', function ($key) {
	$task = App\Task::find($key);
    //return view('default', compact($tasks));
    //echo $task->date;
    return view('update', [
    	'task' => $task,
    	'key' => $key,
    ]);
});

/*с сообщением об успешном сохранении*/
Route::post('/task/{task}', function ($key, Request $request) {
	$validator = Validator::make($request->all(), [
	    'topic' => 'required|max:255',
	    'comment' => 'max:255'
	  ]);

	  if ($validator->fails()) {
	    return redirect('/')
	      ->withInput()
	      ->withErrors($validator);
	  }

	$new = new App\Task;
	$new->Infill($request);

	$task = App\Task::find($key);
	$task->update($new->toArray());
	$tasks = App\Task::orderBy('date', 'asc')->get();

    // return view('default', [
    // 	'tasks' => $tasks,
    // ]);
   	return  redirect('/');
});

