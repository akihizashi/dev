<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Work;
use App\User;

class TasksController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::find($id);
//        $works = Task::find($id)->works;
//        $works = Work::join('tasks', 'tasks.id', '=', 'task_id')->get();
        return view('tasks.show', compact('task', 'works'));
    }

    public function create()
    {
      return view('tasks.create');
    }

    public function store()
    {
      $this->validate(request(), [
          'body' => 'required|max:30|regex:/^[a-zA-Z0-9 ]*$/'
      ]);

      Task::create([
          'body' => request('body'),
          'user_id' => auth()->id()
      ]);

      return redirect('/tasks')->with('status', 'New task created');
    }

}
