<?php

use HaloStreams\Repo\StreamRepositoryInterface;

class StreamController extends \BaseController {

	/**
	 * Streams repo
	 *
	 * @var StreamRepositoryInterface
	 */
	protected $streams = null;

	/**
	 * Constructor
	 *
	 * @param StreamRepositoryInterface $streams
	 */
	public function __construct(StreamRepositoryInterface $streams) {
		$this->streams = $streams;
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
