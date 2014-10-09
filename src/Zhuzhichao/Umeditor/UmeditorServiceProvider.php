<?php namespace Zhuzhichao\Umeditor;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class UmeditorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('zhuzhichao/umeditor');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$router = $this->app['router'];
		$router->post('/umeditor/imageUp', 'UmeditorImageController@upload');
		$router->get('/umeditor.config.js', [
			'as' => 'umeditor.config',
			'uses' => 'UmeditorImageController@config'
		]);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
