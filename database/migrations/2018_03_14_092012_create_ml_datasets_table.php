<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('ml_datasets')) {
			Schema::create('ml_datasets', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('doc_id');
				$table->smallInteger('category');
 
				$table->foreign('category')->references('id')->on('categories');
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
        Schema::dropIfExists('ml_datasets');
    }
}
