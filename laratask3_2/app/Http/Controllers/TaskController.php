<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('home')->with('tasks',$tasks);
    }

    public function create(Request $request){
        $this->validate($request,[
            'title'=>'required',
            ]);

        $task = new Task;

        $task->title = $request->title;
        $task->completed = 0;
        $task->save();

        return redirect()->back();
    }

    public function delete(Request $request){
        $task = Task::find($request->task_id);

        $task->delete();

        return redirect()->back();
    }
}
