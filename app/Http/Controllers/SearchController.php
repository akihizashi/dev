<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Work;

class SearchController extends Controller
{
    public function index()
    {
      $keyword = request('keyword');

      $searchTasks = Task::where([
                          ['user_id', '=', auth()->id()],
                          ['body', 'LIKE', '%' .$keyword. '%']
                          ])->get();
      $searchWorks = Work::where([
                          ['user_id', '=', auth()->id()],
                          ['body', 'LIKE', '%' .$keyword. '%']
                          ])->get();
      return view('search.index', compact('searchTasks', 'searchWorks'));
    }
}
