<?php namespace HaloStreams\Repo;

interface StreamRepositoryInterface {

	/**
	 * Gets all streams
	 *
	 * @return stdClass
	 */
	public function getAllStreams($limit=null);

	/**
	 * Gets a random stream
	 *
	 * @return stdClass
	 */
	public function getRandomStream();

	/**
	 * Gets streams
	 *
	 * @param  integer $limit
	 * @param  integer $offset
	 * @return stdClass
	 */
	public function getStreams($limit=18,$offset=0);

	/**
	 * Gets a stream
	 *
	 * @param  mixed $id
	 * @return stdClass
	 */
	public function getStream($id);

}
