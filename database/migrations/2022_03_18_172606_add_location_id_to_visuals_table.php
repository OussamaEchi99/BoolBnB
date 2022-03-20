<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationIdToVisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visuals', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable()->after('date');

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visuals', function (Blueprint $table) {
            $table->dropForeign('visuals_location_id_foreign');
            $table->dropColumn('location_id');
        });
    }
}
