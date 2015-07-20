<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMissionsTable extends Migration {

	public function up()
	{
		Schema::create('missions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->enum('status', array('planned', 'executed', 'completed', 'canceled'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('missions');
	}
}