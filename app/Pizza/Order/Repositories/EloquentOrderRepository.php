<?php
/**
 * Uses the Eloquent ORM
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Order\Repositories;

use Pizza\Order\OrderRepositoryInterface;
use Pizza\Order\Models\Order;


class EloquentOrderRepository implements OrderRepositoryInterface {


    /**
     *
     * Create new order in repository
     * @param $customerID
     * @param $input
     * @return obj
     */
    public function setOrder($customerID, $input)
    {
        $order = new Order;

        $order->customer_id = $customerID;
        $order->topping1 = $input['topping1'];
        $order->topping2 = $input['topping2'];
        $order->topping3 = $input['topping3'];

        $order->save();

        return $order;
    }
}
