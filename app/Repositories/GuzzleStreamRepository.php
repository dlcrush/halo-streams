<?php namespace App\Repositories;

use App\Repositories\Contracts\StreamRepositoryInterface;
use Cache, Carbon\Carbon;
class GuzzleStreamRepository implements StreamRepositoryInterface {

	/**
	 * Guzzle HTTP Client
	 * @var GuzzleHttp\Client
	 */
	protected $client;

	/**
	 * ClientID
	 * @var String
	 */
	protected $clientID;

	/**
	 * Constructor
	 *
	 * @param \GuzzleHttp\Client $client
	 */
	public function __construct(\GuzzleHttp\Client $client, String $clientID) {
		$this->client = $client;
		$this->clientID = $clientID;
	}

	/**
	 * Gets all streams
	 *
	 * @param mixed $limit
	 * @return stdClass
	 */
	public function getAllStreams($limit=null) {
		return $this->getStreams($limit);
	}

	/**
	 * Gets a random stream
	 *
	 * @return stdClass
	 */
	public function getRandomStream() {
		$streams = $this->getAllStreams(100);

		return $streams->streams[rand(0, count($streams->streams) - 1)];
	}

	/**
	 * Gets streams
	 *
	 * @param  mixed  $limit
	 * @param  integer $offset
	 * @return   stdClass
	 */
	public function getStreams($limit=null,$offset=0) {
					if (Cache::has('allstreams'.$limit.$offset)) {
						 return Cache::get('allstreams'.$limit.$offset);
					}

					$expiresAt = Carbon::now()->addMinutes(5);
					$allstreams = $this->client->get('https://api.twitch.tv/kraken/streams?limit=' . $limit . '&offset=' . $offset,
				['query' => ['game' => 'Halo 5: Guardians'], ['embeddable' => 'true'], 'headers' => ['Client-ID' => $this->clientID]])->json(['object' => true]);
		Cache::put('allstreams'.$limit.$offset, $allstreams, $expiresAt);

		return $allstreams;
	}

	/**
	 *  Get stream
	 * @param  mixed    $id
	 * @return  stdClass
	 */
	public function getStream($id) {
					if (Cache::has($id)) {
													return Cache::get($id);
					}

					$expiresAt = Carbon::now()->addMinutes(1);
		$stream = $this->client->get('https://api.twitch.tv/kraken/streams/' . $id, ['headers' => ['Client-ID' => $this->clientID]])->json(['object' => true]);
		Cache::put($id, $stream, $expiresAt);

		return $stream;
	}

}
