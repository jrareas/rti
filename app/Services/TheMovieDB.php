<?php
namespace App\Services;

use App\Services\RequestMovieDB;

class TheMovieDB {
	const TOP_RATED_KEY='top_rated';
	const POPULAR_KEY='popular';
	const API_VERSION='3';
	private $requestMovieDb;
	private $data;
	public function __construct(RequestMovieDB $requestMovieDb) {
		//echo 1;
		$this->requestMovieDb = $requestMovieDb;
	}
	private function getData($key,$page) {
		if(!isset($this->data[$key][$page])) {
			if(!isset($this->data[$key])) {
				$this->data[$key] = [];
			}
			$this->data[$key][$page] = $this->requestMovieDb->request(sprintf('%s/%s/%s',self::API_VERSION, 'movie',$key),'GET',"page=$page");
		}
		return $this->data[$key][$page];
	}
	private function getDataMovie($movieId) {
		
	}
	public function getPopular($page=1) {
		return $this->getData(self::POPULAR_KEY,$page);
	}
	public function getMovieDetail($movieId) {
		return $this->requestMovieDb->request(sprintf('%s/%s/%s',self::API_VERSION, 'movie',$movieId),'GET');
	}
}