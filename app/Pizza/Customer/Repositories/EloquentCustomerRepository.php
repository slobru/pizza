<?php
/**
 * Uses the Eloquent ORM
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Customer\Repositories;

use Pizza\Customer\CustomerRepositoryInterface;
use Pizza\Customer\Models\Customer;


class EloquentCustomerRepository implements CustomerRepositoryInterface {


    /**
     *
     *
     * @param null $limit
     * @return obj
     */
    public function setCustomer($limit = NULL)
    {
        $posts = Post::with('user')->take($limit)->orderBy('id', 'DESC')->get();

        return $posts;
    }

}
