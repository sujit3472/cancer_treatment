<?php 
Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdminAccess'], function(){ 
	Route::get('/dashboard', 'Admin\DashboardController@index')->name('Admin User');
	Route::resource('/cancer-type', 'Admin\CancerTypeController', ['names' => [ 'index' => 'Manage Cancer Type', 'edit' => 'Cancer Type Edit', 'create' => 'Create Cancer Type']]);
	Route::get('cancer-type/{id}/delete', 'Admin\CancerTypeController@destroy');

	Route::resource('/doctors', 'Admin\DoctorController', ['names' => [ 'index' => 'Manage Doctors', 'edit' => 'Edit Doctor', 'create' => 'Create Doctor']]);

	Route::get('doctors/{id}/delete', 'Admin\DoctorController@destroy');
});
?>