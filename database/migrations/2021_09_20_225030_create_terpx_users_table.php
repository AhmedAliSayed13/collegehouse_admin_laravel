<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerpxUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terpx_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('postal_code');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('terpx_users');
    }
}
