<?php



class JobRequest extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'job_requests';

	protected $fillable  = array('title','description','file' );	
}
