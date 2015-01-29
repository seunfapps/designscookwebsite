<?php 



class Customerproject extends \Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customerprojects';

	// protected $fillable  = array('title','description','file' );	

	public function customer(){
		return $this->belongsTo('Customer');
	}

	public function subcategory(){
		return $this->belongsTo('SubCategory');
	}
	 public function designers(){
        return $this->belongsToMany('Designer');
    }
}
