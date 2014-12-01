<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIllustrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('illustrations', function($table)
		{
			$table->bigInteger('id')->unsigned()->unique();
			$table->bigInteger('user_id')->unsigned()->nullable()->index();
			$table->integer('filesystem')->unsigned()->index();
			$table->string('path');
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
		Schema::drop('illustrations');
	}

}
