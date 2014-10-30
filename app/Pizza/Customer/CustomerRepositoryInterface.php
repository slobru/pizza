<?php
/**
 * Order Repository Interface
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Customer;

interface CustomerRepositoryInterface {

    /**
     * Create new order in repository
     * @param $input
     * @return
     */
    public function setCustomer($input);

}
