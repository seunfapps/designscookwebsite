<?php

class Customer extends Eloquent {

	protected $table='customers';

	public function user(){
		return $this->morphOne('User', 'userable');
	}
}