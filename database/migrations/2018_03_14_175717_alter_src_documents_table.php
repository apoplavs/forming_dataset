<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSrcDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (Schema::hasTable('src_documents') && !Schema::hasColumn('src_documents', 'instance_code')) {
			Schema::table('src_documents', function (Blueprint $table) {
				$table->tinyInteger('instance_code')->after('court_code');
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
		Schema::table('src_documents', function (Blueprint $table) {
			$table->dropColumn('instance_code');
		});
    }
}
