<?php

class StreamController extends \BaseController {

	/**
	 * Display a listing of featured resource.
	 * GET /featured
	 *
	 * @return Response
	 */
	public function featured()
	{
		$client = new GuzzleHttp\Client;
		$streams = $client->get('https://api.twitch.tv/kraken/streams?limit=13',
				['query' =>
					['game' => 'Halo: The Master Chief Collection'],
					['embeddable' => 'true']
				])->json(['object' => true]);
		//DBug::Dbug($streams, true);
		$streams = $streams->streams;

		foreach($streams as $stream) {
			if (! isset($stream->channel->status)) {
				$stream->channel->status = $stream->channel->display_name;
			}
		}


		return View::make('streams.featured', compact('streams'));
	}

	/**
	 * Display a listing of the resource.
	 * GET /streams
	 *
	 * @return Response
	 */
	public function index()
	{
		$client = new GuzzleHttp\Client;
		$streams = $client->get('https://api.twitch.tv/kraken/streams',
				['query' => ['game' => 'Halo: The Master Chief Collection'], ['embeddable' => 'true']])->json(['object' => true]);
		$streams = $streams->streams;
		//DBug::Dbug(array_splice($streams, 1), true);

		return View::make('streams.index', compact('streams'));
	}

	/**
	 * Display the specified resource.
	 * GET /streams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

}
