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
			$table->string('usertype');
			$table->string('name');
			$table->string('username');
			$table->string('email');
			$table->string('ip_address');
			$table->string('country');
			$table->string('phone_no');
			$table->string('password');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
