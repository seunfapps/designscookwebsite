<?php

class Subscription extends Eloquent {

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['email','status'];
    protected $table = 'subscriptions';
    public static $rules = [
		'subscription_email' => 'unique:subscriptions,email',		
	];

	public static $messages = [
		'unique' 	=> 'The :attribute already exists in our database.'
	];


}