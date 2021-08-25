<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meeting_date');
            $table->string('meeting_id');
            $table->string('meeting_url');
            $table->bigInteger('meeting_case_id')->unsigned()->default(2);
            $table->foreign('meeting_case_id')->references('id')->on('meeting_cases')->onDelete('cascade')->onUpdate('cascade');
            $table->string('group_code');
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
        Schema::dropIfExists('meetings');
    }
}
