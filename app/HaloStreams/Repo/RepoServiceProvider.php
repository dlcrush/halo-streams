<?php namespace HaloStreams\Repo;

class RepoServiceProvider extends \ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$app = $this->app;

		$app->bind('HaloStreams\Repo\StreamRepositoryInterface', function($app) {
			return new GuzzleStreamRepository(new \GuzzleHttp\Client);
		});
	}

}