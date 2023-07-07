<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('district');
            $table->string('nearest')->nullable()->default(null);
            $table->string('properties_in');
            $table->string('properties_out');
            $table->string('villa_place');
            $table->string('max_passenger');
            $table->string('number_of_rooms');
            $table->string('number_of_servants');
            $table->string('price');
            $table->enum('price_type', ['rial', 'dollar', 'euro']);
            $table->string('discount')->nullable()->default(null);
            $table->text('body');
            $table->text('sidebar');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('description');
            $table->text('prices');
            $table->enum('status', ['published', 'draft', 'pending'])->default('draft');
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
        Schema::drop('villas');
    }
}
