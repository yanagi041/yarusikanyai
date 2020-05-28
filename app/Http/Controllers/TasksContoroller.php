<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksContoroller extends Controller
{
    public function new()
    {
        return view('tasks.new');
    }
}
