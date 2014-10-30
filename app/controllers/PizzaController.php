<?php

use Pizza\Order\OrderRepositoryInterface as Order;
use Pizza\Customer\CustomerRepositoryInterface as Customer;

class PizzaController extends BaseController {

    /**
     * Repositories
     */
    protected $order;
    protected $customer;

    protected $order_rules = [
        'name' => 'required|alpha_dash',
        'email' => 'required|min:4|max:64|email|unique:customers,email',
    ];

    /**
     *
     *
     * @param Order $order
     * @param Customer $customer
     */
    public function __construct(Order $order, Customer $customer)
    {
        $this->order = $order;
        $this->customer = $customer;
    }

    /**
     * Ger request for order form
     *
     * @return View
     */
    public function getOrder()
    {
        return View::make('index')
            ->with('title', 'New Order');
    }

    /**
     * Post request for pizza order
     *
     * @return Response
     */
    public function postOrder()
    {
        $input = [
            'name' => Input::get( 'name' ),
            'email' => Input::get( 'email' ),
            'topping1' => Input::get( 'topping1', 0),
            'topping2' => Input::get( 'topping2', 0),
            'topping3' => Input::get( 'topping3', 0),
        ];

        //Run input validation
        $v = Validator::make( $input, $this->order_rules );

        if ( $v->fails() ) {
            // Validation has failed

            //render validation messages
            $alert = Alert::renderValidationAlert($v->messages());

            //redirect to order page with old input
            return Redirect::to('order')->with('alert', $alert)->withInput();
        }
        else {
            // Validation passed...store data
            //create customer
            $customer = $this->customer->setCustomer($input);

            //create order
            $this->order->setOrder($customer->id, $input);

            $alert = Alert::renderAlert('Your order has been processed. Thanks!');

            //redirect to login page
            return Redirect::to( 'order')->with('alert', $alert);

        }
    }



}
