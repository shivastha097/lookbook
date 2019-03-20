<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id')->unsigned();
            $table->string('featuredImage');
            $table->string('name');
            $table->string('city');
            $table->string('address')->nullable();
            $table->string('category');
            $table->string('price');
            $table->string('area')->nullable();
            $table->string('rooms')->nullable();
            $table->string('beds')->nullable();
            $table->longText('description');
            $table->boolean('status');
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
        Schema::dropIfExists('rooms');
    }
}
