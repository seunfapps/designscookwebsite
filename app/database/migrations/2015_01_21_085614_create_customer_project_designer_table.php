<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerProjectDesignerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customerproject_designer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('designer_id')->unsigned()->index();
			$table->foreign('designer_id')->references('id')->on('designers')->onDelete('cascade');
			$table->integer('customerproject_id')->unsigned()->index();
			$table->foreign('customerproject_id')->references('id')->on('customerprojects')->onDelete('cascade');
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
		Schema::drop('customerproject_designer');
	}

}
