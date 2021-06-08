<?php

namespace App\Http\Controllers\Doctor;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PatientEnquiry;

class PatientEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objPatientEnquiry = PatientEnquiry::where('cancer_id', Auth::user()->cancer_spacialization_id)->latest()->get();
        return view('doctor.patient-enquiry.index', compact('objPatientEnquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objPatientEnquiry = PatientEnquiry::where([['id', $id], ['cancer_id', Auth::user()->cancer_spacialization_id]])->first();
        if(empty($objPatientEnquiry))
            return redirect('doctor/patient-enquiry');

        ##check the plan is created or not
        if(empty($objPatientEnquiry->fn_patient_enquiry_plan_genration_details))
            return view('doctor.patient-enquiry.show', compact('objPatientEnquiry'));    
        elseif(!empty($objPatientEnquiry->fn_patient_enquiry_plan_genration_details->doctor_id == Auth::user()->id && $objPatientEnquiry->status == '1' ))
            return view('doctor.patient-enquiry.show', compact('objPatientEnquiry'));
        else 
            return redirect('doctor/patient-enquiry');            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
