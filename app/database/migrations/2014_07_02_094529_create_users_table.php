<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    if (!Schema::hasTable('users')) 
    {
      Schema::create('users', function(Blueprint $table)
      {
        $table->increments('uid');
        $table->string('username', '32');
        $table->string('carduid', '100')->index();
        $table->enum('gender', array('B','S','BF','SF'))->index();
        $table->string('hall', 3)->index();
        $table->string('bgroup', 3)->index();
        $table->string('sgroup', 3);
        $table->string('email', 32)->nullable();
        $table->string('mobile', 16)->nullable();
        $table->string('brother_t', 1)->nullable();
        $table->string('sister_t', 1)->nullable();
        $table->string('life_t', 1)->nullable();
        // created_at, updated_at DATETIME
        $table->timestamps();
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
		Schema::dropIfExists('users');
	}

}
