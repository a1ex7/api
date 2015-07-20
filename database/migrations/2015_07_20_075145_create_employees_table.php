<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('position');
			$table->integer('mission_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}