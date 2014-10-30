<?php
/**
 * Service Provider binding Interface and Repository
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */
namespace Pizza;

use Illuminate\Support\ServiceProvider;

class PizzaServiceProvider extends ServiceProvider {

	/**
	 *
	 */
	public function register()
	{
		$this->app->bind(
            'Pizza\Order\OrderRepositoryInterface',
            'Pizza\Order\Repositories\EloquentOrderRepository'
		);

        $this->app->bind(
            'Pizza\Customer\CustomerRepositoryInterface',
            'Pizza\Customer\Repositories\EloquentCustomerRepository'
        );

	}
}
