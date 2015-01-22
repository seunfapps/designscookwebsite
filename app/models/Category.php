<?php



class Category extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'design_categories';

	public function subcategories(){
		return $this->hasMany('SubCategory');
	}

	public function projects(){
		return $this->hasManyThrough('CustomerProject','SubCategory');
	}

}
