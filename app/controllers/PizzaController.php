<?php

use Pizza\Order\OrderRepositoryInterface as Order;
use Pizza\Customer\CustomerRepositoryInterface as Customer;

class PizzaController extends BaseController {

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

    protected $order_rules = [
        'title' => 'required',
        'content' => 'required',
        'slug' => 'required|unique:posts',
        'excerpt' => 'required',
    ];

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
            'address' => Input::get( 'address' ),
            'city' => Input::get( 'city' ),
            'postal_code' => Input::get( 'postal_code' ),
            'topping1' => Input::get( 'topping1' ),
            'topping2' => Input::get( 'topping2' ),
            'topping3' => Input::get( 'topping3' ),
        ];

        //Run input validation
        $v = Validator::make( $input, $this->order_rules );

        if ( $v->fails() ) {
            // Validation has failed

            //redirect to order page with old input
            return Redirect::to('order')->with('alert', $v->messages())->withInput();
        }
        else {
            // Validation passed...store data
            //create customer
            $customer = $this->customer->setCustomer($input);

            $order = $this->order->setOrder($customer->id);

            //redirect to login page
            return Redirect::to( 'order')->with('alert', 'The post has been saved');

        }
    }



}
