<?php

namespace Pizza\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';


    public function orders()
    {
        return $this->hasMany('Pizza\Order\Models\Order');
    }

}