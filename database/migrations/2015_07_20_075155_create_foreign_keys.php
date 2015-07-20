<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('targets', function(Blueprint $table) {
			$table->foreign('mission_id')->references('id')->on('missions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('employees', function(Blueprint $table) {
			$table->foreign('mission_id')->references('id')->on('missions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('targets', function(Blueprint $table) {
			$table->dropForeign('targets_mission_id_foreign');
		});
		Schema::table('employees', function(Blueprint $table) {
			$table->dropForeign('employees_mission_id_foreign');
		});
	}
}