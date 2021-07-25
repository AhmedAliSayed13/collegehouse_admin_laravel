<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name'); 
            $table->string('last_name');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('email');
            $table->date('birthday');
            $table->string('phone');
            $table->string('ssn');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->string('zip');
            $table->bigInteger('house_type_id')->unsigned();
            $table->foreign('house_type_id')->references('id')->on('house_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('school');
            $table->string('major');
            $table->string('graduation_year');
            $table->Integer('gpa');
            $table->bigInteger('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('paying_rent_id')->unsigned();
            $table->foreign('paying_rent_id')->references('id')->on('paying_rents')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('bringing_Car');
            
            $table->string('requested_houses');
            // $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('room_type_id')->unsigned()->nullable();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('amount_pay_dollars');
            $table->string('car_make')->nullable();
            $table->string('car_model')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('car_license_number')->nullable();
            $table->string('requested_property')->nullable();
            $table->string('group_lead_name')->nullable();
            $table->string('group_member_email_1')->nullable();
            $table->string('group_member_email_2')->nullable();
            $table->string('group_member_email_3')->nullable();
            $table->string('group_member_email_4')->nullable();
            $table->boolean('register_vote')->defult(1);
            $table->boolean('both_parents_signing');
            $table->bigInteger('parent_information2_id')->unsigned();
            $table->foreign('parent_information2_id')->references('id')->on('parent_informations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parents_sign_not_other_reasons')->nullable();
            $table->bigInteger('parent_information1_id')->unsigned()->nullable();
            $table->foreign('parent_information1_id')->references('id')->on('parent_informations')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('reason_sign_parent_id')->unsigned()->nullable();
            $table->foreign('reason_sign_parent_id')->references('id')->on('reason_sign_parents')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('have_rental_history');
            $table->boolean('have_employment_history');
            $table->string('applicant_full_name');
            $table->boolean('terms_and_conditions');
            $table->bigInteger('application_case_id')->unsigned()->default(1);
            $table->foreign('application_case_id')->references('id')->on('application_cases')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('meeting_date')->nullable();
            // $table->string('meeting_id')->nullable();
            // $table->string('meeting_url')->nullable();
            $table->bigInteger('meeting_id')->unsigned()->nullable();
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('applications');
    }
}
