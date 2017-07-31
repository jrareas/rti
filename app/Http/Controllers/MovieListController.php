<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TheMovieDB;

class MovieListController extends Controller
{
	private $movieDb;
	public function __construct(TheMovieDB $movieDb) {
		$this->movieDb = $movieDb;
	}
    public function getList($key,$page) {
    	return $this->movieDb->getPopular($page);
    }
}
