<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('categories', function (Blueprint $table) {
			$table->smallInteger('id');
			$table->tinyInteger('justice_kind');
			$table->string('name');
			
			$table->primary('id');
			$table->foreign('justice_kind')->references('justice_kind')->on('justice_kinds');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('categories');
    }
}
