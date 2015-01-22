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
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->string('status');
			$table->string('title');
			$table->string('description');
			$table->string('file');
			$table->string('designers_by_id');
			$table->integer('subcategory_id')->unsigned()->index();
			$table->foreign('subcategory_id')->references('id')->on('design_subcategories')->onDelete('cascade');
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
		Schema::drop('projects');
	}

}
