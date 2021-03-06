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
			$table->string('user_type');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->string('ip_address');
			$table->string('country')->nullable();
			$table->string('company')->nullable();
			$table->string('phone');
			$table->string('password');
			$table->string('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->integer('userable_id');
			$table->string('userable_type');
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
