<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('usertype');
			$table->string('name');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('ip_address');
			$table->string('country');
			$table->string('phone_no');
			$table->string('password');
			$table->string('confirmed')->default();
			$table->string('confirmation_code');
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
		Schema::drop('users');
	}

}
