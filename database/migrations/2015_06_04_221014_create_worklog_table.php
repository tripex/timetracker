<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorklogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worklog', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('fk_client')->unsigned();
            $table->integer('fk_user')->unsigned();
            $table->float('hours_used')->unsigned();
            $table->integer('odometer_start')->unsigned();
            $table->integer('odometer_end')->unsigned();
            $table->integer('kilometers')->unsigned();
            $table->mediumText('note');
            $table->dateTime('work_date_start');
            $table->dateTime('work_date_end');
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
		Schema::drop('worklog');
	}

}
