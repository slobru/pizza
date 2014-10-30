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
     *
     * @param null $limit
     * @return obj
     */
    public function setOrder($limit = NULL)
    {
        $posts = Post::with('user')->take($limit)->orderBy('id', 'DESC')->get();

        return $posts;
    }
}
