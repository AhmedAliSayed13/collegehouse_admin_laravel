<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerpxProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terpx_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('price');
            $table->text('describe');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('location');
            $table->integer('status')->default(1);
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('terpx_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('terpx_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('terpx_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('terpx_products');
    }
}
