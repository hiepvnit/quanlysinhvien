<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect('/roles');
        } elseif ($user->hasRole('teacher')) {
            return redirect('/lop');
        } else {
            return redirect('/hocvien/detail/'.$user->HocVienID);
        }
    }
}
