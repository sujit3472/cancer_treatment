<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'cancer_spacialization_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Function to define the user & patient relation
    */ 
    public function fn_patient_details() {
        return $this->hasOne('App\Model\PatientDetails','user_id');
    }

    /**
    * Function to define the user & patient_enquiry relation
    */ 
    public function fn_patient_enquiry_details() {
        return $this->hasMany('App\Model\PatientEnquiry','user_id');
    }

    /**
    * Function to define the user & EnquiryPlanGenration relation
    */ 
    public function fn_doctor_plan_genration_details() {
        return $this->hasOne('App\Model\EnquiryPlanGenration','doctor_id');
    }

    /**
    * Function to define the user & CancerType relation
    */ 
    public function fn_cancer_data() {
        return $this->belongsTo('App\Model\CancerType', 'cancer_spacialization_id');
    }
}
