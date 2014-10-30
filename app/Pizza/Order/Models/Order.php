<?php

namespace Pizza\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order';


    public function customer()
    {
        return $this->belongsTo('Pizza\Customer\Models\Customer');
    }

}