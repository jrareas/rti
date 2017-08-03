<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TheMovieDB;

class VideoDetailController extends Controller
{
	private $movieDb;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(TheMovieDB $movieDb)
	{
		$this->middleware('auth');
		$this->movieDb = $movieDb;
	}
	
	public function index($movieId) {
		$video = $this->movieDb->getMovieDetail($movieId);
		list($release_year,,) = explode('-',$video['release_date']);
		$video['release_year'] = $release_year;
		return view('video',['content_class'=>'movie_detail', 'page'=>'<i class="arrow fa fa-arrow-left" aria-hidden="true"></i>Movie Detail','video'=>$video]);
	}
}
