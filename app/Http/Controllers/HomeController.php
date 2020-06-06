<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('mypage');
    }

    // public function index($id)
    // {
    //     if (!ctype_digit($id)) {
    //         return redirect('/mypage')->with('flash_message', __('Invalid opration was performed.'));
    //     }
        
    //     $task = Auth::user()->tasks()->find($id);
    //     return view('mypage', ['task' => $task]);
    // }



    public function profile()
    {
        return view('profile');
    }

    public function editEmail()
    {
        return view('edit-email');
    }

    public function editPass()
    {
        return view('edit-pass');
    }
}
