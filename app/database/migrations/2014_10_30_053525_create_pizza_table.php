<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pizza', function($table)
        {
            $table->increments('id');
            $table->integer('customer_id');
            $table->boolean('topping1');
            $table->boolean('topping2');
            $table->boolean('topping3');
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
        Schema::drop('pizza');
	}

}
