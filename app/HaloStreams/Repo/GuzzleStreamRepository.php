<?php namespace HaloStreams\Repo;

class GuzzleStreamRepository implements StreamRepositoryInterface {

	protected $client;

	public function __construct(\GuzzleHttp\Client $client) {
		$this->client = $client;
	}

	public function getAllStreams($limit=null) {
		return $this->getStreams($limit);
	}

	public function getRandomStream() {
		// @TODO Get random stream
	}

	public function getStreams($limit=null,$offset=0) {
		return $this->client->get('https://api.twitch.tv/kraken/streams?limit=' . $limit . '&offset=' . $offset,
				['query' => ['game' => 'Halo: The Master Chief Collection'], ['embeddable' => 'true']])->json(['object' => true]);
	}

	public function getStream($id) {
		return $stream = $this->client->get('https://api.twitch.tv/kraken/streams/' . $id)->json(['object' => true]);
	}

}
