<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TaskController extends Controller
{
    public function index() {
    	$task = App\Task::all();
    	return view('default', compact('task'));
    }
}
