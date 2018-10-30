<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoneController extends Controller
{
    //
    //
    public function index(Request $request)
    {
        if (Auth::check())
        {
            $tasks = Task::where('user_id', Auth::id())
                ->where('done', true)
                ->orderBy('created_at', 'desc')->get();
            return view('done.index', [
                'tasks' => $tasks
            ]);
        } else {
            return redirect('/home');
        }
    }
}
