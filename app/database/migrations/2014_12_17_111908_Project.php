<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned()->index();
			$table->foreign('customer_id')->references('id')->on('roles')->onDelete('cascade');
			$table->string('status');
			$table->string('title');
			$table->string('description');
			$table->string('file');
			$table->string('designers_by_id');
			$table->string('subcategory_id');
			$table->decimal('cost');
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
		//
		Schema::table('projects', function($table){
    		$table->drop_index('projects_user_id_foreign');
	    	$table->drop_foreign('projects_user_id_foreign');
		});
	}

}
