<?php
namespace App\Services;

class RequestMovieDB{
	const MOVIEDB_URL='https://api.themoviedb.org';
	private $stack;
	private $client;
	private $cache_ttl=600;
	
	public function __construct(){
		$this->stack = \GuzzleHttp\HandlerStack::create();
		
		$this->stack->push(
				new \Kevinrob\GuzzleCache\CacheMiddleware(
						new \Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy(
								new \Kevinrob\GuzzleCache\Storage\FlysystemStorage(
										new \League\Flysystem\Adapter\Local(base_path() .  '/storage/cache')
										), $this->cache_ttl
								)
						),
				'cache'
				);
		
	}
	private function getClient() {
		if ($this->client == null || $reset) {
			$this->client = new \GuzzleHttp\Client(
					['handler' => $this->stack,
							'verify' => true
					]
					);
		}
		
		return $this->client;
	}
	private function getApiKeyQueryString() {
		if(env('MOVIE_DB_API_KEY')) {
			return sprintf("%s=%s","api_key",env('MOVIE_DB_API_KEY'));
		}else{
			throwException('Api key variable(MOVIE_DB_API_KEY) is not set');
		}
	}
	public function request($endpoint,$method='GET',$query="",$headers=[],$body=[],$async=false) {
		$querystring = [];
		$querystring[] = $this->getApiKeyQueryString();
		if(!empty($query)) {
			$querystring[] = $query;
		}
		
		$url = self::MOVIEDB_URL . "/" . ltrim($endpoint,"/") . "?" . implode("&", $querystring);
		$data = [];
		if ($async) {
			$this->promisse = $this->getClient()->requestAsync($method, $url, $data);
			$this->promisse->then(function ($resp) {
				$this->responseAfterPromisse = json_decode($resp->getBody(),true);
			});
		
				return $this;
		} else {
			$response = $this->getClient()->request($method,$url,$data);
			return json_decode($response->getBody(),true);
		}
	}
}