<?php

class StreamControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testIndex()
	{
		$this->call('GET', 'streams');

		$this->assertViewHas('streams');
	}

}
