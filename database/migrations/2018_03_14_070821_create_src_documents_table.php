<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSrcDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('src_documents', function (Blueprint $table) {
            $table->integer('doc_id');
            $table->smallInteger('court_code');
            $table->tinyInteger('judgment_code');
			$table->tinyInteger('justice_kind');
			$table->string('cause_num', 128);
			$table->date('adjudication_date');
			$table->smallInteger('judge');
			$table->mediumText('doc_text');
            $table->primary('doc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('src_documents');
    }
}
