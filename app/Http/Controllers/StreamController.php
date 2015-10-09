<?php namespace App\Http\Controllers;

use App\Repositories\Contracts\StreamRepositoryInterface;
use Input;

class StreamController extends Controller {

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
    	return response()->json($this->streams->getAllStreams(13));
    	
    	$streams = $this->streams->getAllStreams(13)->streams;

    	return view('streams.featured', compact('streams'));
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

    	$streams = $this->streams->getStreams($limit, $offset)->streams;

    	$total = $this->streams->getAllStreams()->_total;

    	return view('streams.index', compact('streams', 'offset', 'limit', 'total'));
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
    	$stream = $this->streams->getStream($id)->stream;

    	return view('streams.show', compact('stream'));
    }

    public function random()
    {
    	$stream = $this->streams->getRandomStream();

    	return view('streams.show', compact('stream'));
    }

   }
