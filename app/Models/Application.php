<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender_id', 'email', 'birthday',
         'phone',
         'ssn',
         'address1',
         'address2',
         'city_id',
         'state_id',
         'zip',
         'house_type_id',
         'school',
         'major',
         'graduation_year',
         'gpa',
         'chapter_id',
         'payment_method_id',
         'paying_rent_id',
         'bringing_Car',
         'requested_houses',
         'room_type_id',
         'room_id',
         'amount_pay_dollars',
         'car_make',
         'car_model',
         'driver_license_number',
         'car_license_number',
         'requested_property',
         'group_lead_name',
         'group_member_name_1',
         'group_member_name_2',
         'group_member_name_3',
         'group_member_name_4',
         'problem-with-both-parents-signing',
         'parents_sign_not',
         'parents_sign_not_other_reasons',
         'parent_information1_id',
         'parent_information2_id',
         'have_rental_history',
         'have_employment_history',
         'applicant-full-name'
         
        ];
}
