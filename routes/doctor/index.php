<?php 
Route::group(['prefix' => 'doctor', 'middleware' => 'CheckDoctorAccess'], function(){ 
	Route::get('/dashboard', 'Doctor\DashboardController@index')->name('Doctor User');
	Route::resource('/patient-enquiry', 'Doctor\PatientEnquiryController', ['names' => [ 'index' => 'Manage Patient Enquiry', 'show' => 'Patient Enquiry Details']]);
	Route::post('/plan-genration', 'Doctor\PlanGenrationController@fn_plan_generation');
	
});

?>