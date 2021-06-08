<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientDetails extends Model
{
	use SoftDeletes;
	protected $table   	= "patient_details";
	protected $fillable = ['id', 'user_id', 'contact_number', 'state', 'city', 'address', 'pincode'];

	/**
	 * User relationship
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function fn_patient_data()
	{
	    return $this->belongsTo('App\User', 'user_id');
	}
}