<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobRequests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id');
			$table->string('status');
			$table->string('title');
			$table->string('detail');
			$table->string('designers_by_id');
			$table->string('categories_by_id');
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
		Schema::drop('job_requests');
	}

}
