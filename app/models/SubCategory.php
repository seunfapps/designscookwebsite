<?php



class SubCategory extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'design_subcategories';

	public function category(){
		return $this->belongsTo('Category');
	}

	public function projects(){
		return $this->hasMany('CustomerProject');
	}

}
