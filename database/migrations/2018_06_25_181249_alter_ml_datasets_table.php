<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMlDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('ml_datasets') && !Schema::hasColumn('ml_datasets', 'by_user')) {
            Schema::table('ml_datasets', function (Blueprint $table) {
                $table->smallInteger('confirm_category')->default(0)->after('category');
                $table->unsignedInteger('by_user')->default(0)->after('doc_text');
                $table->unsignedInteger('confirm_by_user')->default(0)->after('by_user');
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
        Schema::table('ml_datasets', function (Blueprint $table) {
            $table->dropColumn('confirm_category');
            $table->dropColumn('by_user');
            $table->dropColumn('confirm_by_user');
        });
    }
}
