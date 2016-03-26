<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyHasImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_has_images', function (Blueprint $table) {
			$table->integer('company_id');
			$table->integer('image_id');

			$table->foreign('company_id')
			->references('id')->on('companies')
			->onDelete('cascade');

			$table->foreign('image_id')
			->references('id')->on('images')
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
		Schema::drop('company_has_images');
	}

}
