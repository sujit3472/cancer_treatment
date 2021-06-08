<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\CancerType;
use App\Model\PatientEnquiry;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$intDoctorUserCount = User::where('role_id', '2')->count();
    	$intPatientEnquiryCount = PatientEnquiry::count();
    	$intCancerTypeCount = CancerType::count();
    	return view('admin.dashboard.report_dashboard', compact('intDoctorUserCount', 'intPatientEnquiryCount', 'intCancerTypeCount'));
    }
}