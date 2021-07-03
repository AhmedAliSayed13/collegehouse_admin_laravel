<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;
use App\Models\City;
use App\Models\State;
use App\Models\House_type;
use App\Models\Room;
use App\Models\Room_type;
use App\Models\Chapter;
use App\Models\Payment_method;
use App\Models\Paying_rent;
use App\Models\Reason_sign_parent;
use App\Models\Parent_information;
use App\Models\Rental_history;
use App\Models\Employment;
use App\Models\Meeting;
use App\Models\Application_case;
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
         'reason_sign_parent_id',
         'parents_sign_not_other_reasons',
         'parent_information1_id',
         'parent_information2_id',
         'have_rental_history',
         'have_employment_history',
         'applicant_full_name',
         'register_vote'
         
        ];
        



    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function house_type()
    {
        return $this->belongsTo(House_type::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function room_type()
    {
        return $this->belongsTo(Room_type::class);
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class);
    }
    public function paying_rent()
    {
        return $this->belongsTo(Paying_rent::class);
    }
    public function reason_sign_parent()
    {
        return $this->belongsTo(Reason_sign_parent::class);
    }
    public function parent_information1()
    {
        if($this->parent_information1_id){
            $parent1=Parent_information::find($this->parent_information1_id);
            return  $parent1;
        }
        return null;
    }
    public function parent_information2()
    {
        if($this->parent_information2_id){
            $parent2=Parent_information::find($this->parent_information2_id);
            return  $parent2;
        }
        return null;
    }

    public function rental_historys()
    {
        return $this->hasMany(Rental_history::class);
    }
    public function employments()
    {
        return $this->hasMany(Employment::class);
    }
    public function meeting()
    {
        return $this->hasOne(Meeting::class);
    }
    public function application_case()
    {
        return $this->belongsTo(Application_case::class);
    }
}
