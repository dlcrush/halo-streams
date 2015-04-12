<?php namespace App\Repositories;

use App\Repositories\Contracts\StreamRepositoryInterface;

class GuzzleStreamRepository implements StreamRepositoryInterface {

    /**
     * Guzzle HTTP Client
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * Constructor
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(\GuzzleHttp\Client $client) {
        $this->client = $client;
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
        // @TODO Get random stream
    }

    /**
     * Gets streams
     *
     * @param  mixed  $limit
     * @param  integer $offset
     * @return   stdClass
     */
    public function getStreams($limit=null,$offset=0) {
        return $this->client->get('https://api.twitch.tv/kraken/streams?limit=' . $limit . '&offset=' . $offset,
                ['query' => ['game' => 'Halo: The Master Chief Collection'], ['embeddable' => 'true']])->json(['object' => true]);
    }

    /**
     *  Get stream
     * @param  mixed    $id
     * @return  stdClass
     */
    public function getStream($id) {
        return $stream = $this->client->get('https://api.twitch.tv/kraken/streams/' . $id)->json(['object' => true]);
    }

}
