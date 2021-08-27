<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('zailcode')->nullable();
            $table->string('email');
            $table->bigInteger('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('leader')->default(0);
            $table->boolean('complate')->default(0);
            $table->bigInteger('group_status_id')->unsigned()->default(1);
            $table->Integer('rate')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
