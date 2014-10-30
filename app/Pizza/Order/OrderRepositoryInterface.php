<?php
/**
 * Order Repository Interface
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Order;

interface OrderRepositoryInterface {

    /**
     * Create new order in repository
     * @param $input
     * @return
     */
    public function createOrder($input);

}
