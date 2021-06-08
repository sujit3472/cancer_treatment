<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryDocument extends Model
{
	use SoftDeletes;
	protected $table   	= "enquiry_document";
	protected $fillable = ['id', 'patient_enquiry_id', 'document_name'];

	/**
	* Function to define the patient_enquiry & EnquiryDocument relation
	*/ 
	public function fn_patient_enquiry_document_data() {
	    return $this->belongsToMany('App\Model\PatientEnquiry', 'patient_enquiry_id');
	}
}