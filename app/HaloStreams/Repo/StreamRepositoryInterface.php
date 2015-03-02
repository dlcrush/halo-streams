<?php namespace HaloStreams\Repo;

interface StreamRepositoryInterface {

	/**
	 * [getAllStreams description]
	 * @return [type] [description]
	 */
	public function getAllStreams();

	/**
	 * [getRandomStream description]
	 * @return [type] [description]
	 */
	public function getRandomStream();

	/**
	 * Gets streams
	 * @param  integer $limit  [description]
	 * @param  integer $offset [description]
	 * @return [type]          [description]
	 */
	public function getStreams($limit=18,$offset=0);

	/**
	 * [getStream description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getStream($id);

}
