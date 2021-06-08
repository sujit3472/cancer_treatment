<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryPlanGenration extends Model
{
	use SoftDeletes;
	protected $table   	= "enquiry_plan_genration";
	protected $fillable = ['id', 'patient_enquiry_id', 'description', 'doctor_id', 'file_name'];

	protected $casts    = ['file_name' => 'array'];

	/**
	* Function to define the patient_enquiry & EnquiryPlanGenration relation
	*/ 
	public function fn_patient_enquiry_plan_genration_data() {
	    return $this->belongsTo('App\Model\PatientEnquiry', 'patient_enquiry_id');
	}

	/**
	* Function to define the user & EnquiryPlanGenration relation
	*/ 
	public function fn_doctor_plan_genration_data() {
	    return $this->belongsTo('App\User','doctor_id');
	}
}