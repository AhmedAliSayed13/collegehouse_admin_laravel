<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address');
            $table->string('status');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->bigInteger('house_type_id')->unsigned();
            $table->foreign('house_type_id')->references('id')->on('house_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('num_rooms');
            $table->integer('num_residents');
            $table->integer('num_bathrooms');
            $table->integer('num_flooers');
            $table->integer('num_parkings');
            $table->integer('total_size');
            $table->integer('num_kitchens');
            $table->string('annual_reset');
            $table->bigInteger('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image_ownership');
            $table->string('image_lease');
            $table->string('description', 255);
            $table->string('about', 255);
            $table->string('excellent_location', 255);
            $table->string('safety_security', 255);
            $table->string('professional_maintenance', 255);
            $table->string('resident_account', 255);
            $table->string('video');
            $table->string('pdf');






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
        Schema::dropIfExists('houses');
    }
}
