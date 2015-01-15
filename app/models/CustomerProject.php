<?php 



class CustomerProject extends \Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	protected $fillable  = array('title','description','file' );	

	public function customer(){
		return $this->belongsTo('Customer');
	}
}
