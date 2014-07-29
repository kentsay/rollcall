<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
  {
    if (!Schema::hasTable('training'))
    {
      Schema::create('training', function(Blueprint $table)
      {
        $table->string('uid')->unique();
        $table->enum('training', array('brothers_t','sisters_t','life_t','2014_summer_vt'));
      });
    }
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('training', function(Blueprint $table)
		{
      Schema::dropIfExists('training');
		});
	}

}
