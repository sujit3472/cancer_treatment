<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

##route for the patient enquiery
Route::post('/patient-enquiry', 'Frontend\PatientEnquiryController@store');
Auth::routes();

Route::get('/home', function() 
{
    if(Auth::check()) {
        $intRole = Auth::user()->role_id;
        switch ($intRole) {
            case 1:
                Flash::success('Login Successfully')->important();
                return redirect('admin/dashboard');
            case 2:
                Flash::success('Login Successfully')->important();
                return redirect('/doctor/dashboard');
            case 3:
                return redirect('/');
        }
    } else {
        return redirect('/');
    }
});

include('admin/index.php');
include('doctor/index.php');
Route::get('/', 'HomeController@index')->name('home');


