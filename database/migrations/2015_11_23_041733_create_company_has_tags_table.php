<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_has_tags', function (Blueprint $table) {
			$table->integer('company_id');
			$table->integer('tags_id');

			$table->foreign('company_id')
			->references('id')->on('companies')
			->onDelete('cascade');

			$table->foreign('tags_id')
			->references('id')->on('tags')
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
		Schema::drop('company_has_tags');
	}

}
