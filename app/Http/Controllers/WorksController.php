<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Task;
use App\Work;

class WorkController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show($id)
  {
    $task = Task::find($id);
    return view('works.create', compact('task'));
  }

  public function store()
  {
    $this->validate(request(), [
        'body'        => 'required|max:31|regex:/^[a-zA-Z0-9 ]*$/',
        'deadline'    => 'required'
    ]);

    Work::create([
        'user_id'     => auth()->id(),
        'task_id'     => request('task_id'),
        'body'        => request('body'),
        'updated_at'  => request('deadline')
    ]);

    return back()->with('status', 'New work created');
  }

  public function delete()
  {
    Work::where('id', '=', request('work_id'))->delete();
    return back()->with('status', 'Work deleted');
  }
}
