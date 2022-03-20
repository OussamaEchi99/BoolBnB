<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 255)->unique();
            $table->string('photo', 255);
            $table->decimal('lat', 7, 4);
            $table->decimal('long', 7, 4);
            $table->tinyInteger('rooms')->unsigned();
            $table->tinyInteger('beds')->unsigned();
            $table->tinyInteger('bathrooms')->unsigned();
            $table->tinyInteger('square_meters')->unsigned();
            $table->decimal('price', 7, 2);
            $table->tinyInteger('visible');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
