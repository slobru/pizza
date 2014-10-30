<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('orders', function($table)
        {
            $table->increments('id');
            $table->integer('customer_id');
            $table->tinyInteger('topping1')->default(0);
            $table->tinyInteger('topping2')->default(0);
            $table->tinyInteger('topping3')->default(0);
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('orders');
	}

}
