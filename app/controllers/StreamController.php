<?php

use HaloStreams\Repo\GuzzleStreamRepository;

class StreamController extends \BaseController {

	private $streams = null;

	/**
	 * Constructor
	 */
	public function __construct(GuzzleStreamRepository $streams) {
		$this->streams = $streams;
	}

	/**
	 * Guarantees that every stream's channel will have a status.
	 *
	 * @param  mixed $streams the stream or streams to fix
	 * @return array list of all the streams with values for the status
	 */
	public function fixStatus($streams) {
		if (! is_array($streams)) {
			$streams = array($streams);
		}

		foreach($streams as $stream) {
			if (! isset($stream->channel->status)) {
				$stream->channel->status = $stream->channel->display_name;
			}
		}

		return $streams;
	}

	/**
	 * Display a listing of featured resource.
	 * GET /featured
	 *
	 * @return Response
	 */
	public function featured()
	{
		$streams = $this->streams->getAllStreams(13)->streams;

		$streams = $this->fixStatus($streams);

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
		$offset = Input::get('offset', 0);
		$limit = Input::get('limit', 18);

		$streams = $this->streams->getStreams($limit, $offset);

		$total = $streams->_total;

		$streams = $this->fixStatus($streams->streams);

		return View::make('streams.index', compact('streams', 'offset', 'limit', 'total'));
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
		$stream = $this->streams->getStream($id);

		$stream = $this->fixStatus($stream->stream);
		$stream = $stream[0];

		return View::make('streams.show', compact('stream'));
	}

}
