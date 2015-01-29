<?php

class Designer extends Eloquent {

	protected $table='designers';

	 /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [];

    protected $hidden = ['user_id'];


	public function user(){
		return $this->morphOne('User', 'userable');
	}

    public function customerprojects(){
        return $this->belongsToMany('Customerproject')->withTimestamps();
    }
}