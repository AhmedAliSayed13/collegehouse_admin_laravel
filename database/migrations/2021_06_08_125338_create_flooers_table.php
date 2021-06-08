<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlooersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flooers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('size');
            $table->integer('bathroom');
            $table->integer('room');
            $table->string('describe');
            $table->string('image');
            $table->bigInteger('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('flooers');
    }
}
