<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientEnquiry extends Model
{
	use SoftDeletes;
	protected $table   	= "patient_enquiry";
	protected $fillable = ['id', 'user_id', 'cancer_id', 'status'];

	/**
	* Function to define the user & patient relation
	*/ 
	public function fn_patient_enquiry_data() {
	    return $this->belongsTo('App\User','user_id');
	}

	/**
	* Function to define the patient_enquiry & EnquiryDocument relation
	*/ 
	public function fn_patient_enquiry_document() {
	    return $this->hasMany('App\Model\EnquiryDocument', 'patient_enquiry_id');
	}

	/**
	* Function to define the patient_enquiry & EnquiryPlanGenration relation
	*/ 
	public function fn_patient_enquiry_plan_genration_details() {
	    return $this->hasOne('App\Model\EnquiryPlanGenration', 'patient_enquiry_id');
	}
}