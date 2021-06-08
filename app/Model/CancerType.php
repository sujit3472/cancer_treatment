<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CancerType extends Model
{
	use SoftDeletes;
	protected $table   	= "cancer_type";
	protected $fillable = ['id', 'name'];

	/**
	* Function to define the user & CancerType relation
	*/ 
	public function fn_cancer_details() {
	    return $this->hasOne('App\User', 'cancer_spacialization_id');
	}
	
}