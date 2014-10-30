<?php
/**
 * Service Provider binding Interface and Repository
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza;

class PizzaServiceProvider extends ServiceProvider {

	/**
	 *
	 */
	public function register()
	{
		$this->app->bind(
			'Pizza\Order\OrderRepositoryInterface',
			'Pizza\Order\EloquentOrderRepository'
		);

	}
}
