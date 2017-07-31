<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TheMovieDB;

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
    public function index(TheMovieDB $movieDb)
    {
        return view('home',['page'=>'Popular Movies','movies'=>$movieDb->getPopular()]);
    }
}
