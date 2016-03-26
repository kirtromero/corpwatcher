<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submissions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('url');
			$table->mediumText('address');
			$table->string('country');
			$table->string('state');
			$table->string('city');
			$table->longText('profile');
			$table->integer('category_id');
			$table->integer('sub_category_id');
			$table->string('others');
			$table->string('phone');
			$table->string('fax');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')
			->references('id')->on('users')
			->onDelete('cascade');

			$table->foreign('category_id')
			->references('id')->on('categories')
			->onDelete('cascade');

			$table->foreign('sub_category_id')
			->references('id')->on('sub_categories')
			->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('submissions');
	}

}
