<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTargetsTable extends Migration {

	public function up()
	{
		Schema::create('targets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type');
			$table->enum('status', array('planned', 'performed', 'achieved', 'canceled'));
			$table->integer('mission_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('targets');
	}
}