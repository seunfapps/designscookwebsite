<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Designers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('roles')->onDelete('cascade');
			$table->string('specialties');
			$table->text('overview');
			$table->integer('rank');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('designers', function($table){
    		$table->drop_index('designers_user_id_foreign');
	    	$table->drop_foreign('designers_user_id_foreign');
		});
	}

}
