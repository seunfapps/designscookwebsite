<?php

class Customer extends Eloquent {

	protected $table='customers';

	protected $hidden = ['user_id'];
	public function user(){
		return $this->morphOne('User', 'userable');
	}
}