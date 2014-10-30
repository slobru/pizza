<?php

use Pizza\Order\OrderRepositoryInterface as Order;

class OrderController extends BaseController {

    /**
     *
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
            $post = $this->order->createOrder($input);

            //redirect to login page
            return Redirect::to( 'posts/edit/' .  $post->id)->with('alert', 'The post has been saved');

        }
    }



}
