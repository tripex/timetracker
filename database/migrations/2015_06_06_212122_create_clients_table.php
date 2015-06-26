<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('clients', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('fk_user')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company');
            $table->integer('vat_number')->unsigned();
            $table->string('email');
            $table->integer('phone');
            $table->integer('zipcode')->unsigned();
            $table->string('city');
            $table->string('street');
            $table->enum('client_type',['private','company']);
            $table->integer('hourly_rate')->unsigned();
            $table->enum('currency',['DKK']);
            $table->timestamps();

            $table->foreign('fk_user')
                ->references('id')
                ->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
