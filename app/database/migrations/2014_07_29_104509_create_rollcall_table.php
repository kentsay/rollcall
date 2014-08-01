<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollcallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rollcall', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('uid', 100);
      $table->string('username', 32);
      $table->enum('trainingtype', array('brothers_t','sisters_t','life_t','2014_summer_vt'));
      $table->dateTime('record_date')->index();
      $table->enum('record', array('ontime','late','absent','leave'))->index();
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
		Schema::table('rollcall', function(Blueprint $table)
		{
		  Schema::dropIfExists('rollcall');
		});
	}

}
