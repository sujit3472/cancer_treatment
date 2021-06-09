<?php

namespace App\Http\Controllers\Frontend;

use DB;
Use Auth;
use Flash;
use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Fronend\CreatePatientEnquiryRequest;

class PatientEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\CreatePatientEnquiryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePatientEnquiryRequest $request)
    {
        $requestData = $request->all();
        if(Auth::check() ) {
            if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1) {
            Flash::error("You have not authorized user")->important();
            return redirect('/');
            }
        }
       
        try {
            DB::beginTransaction();
            ##store the data in users table
            // users
            $requestData['password'] = Hash::make($requestData['password']); 
            $requestData['role_id']  = '3';
            $requestData['cancer_spacialization_id']  = NULL;
            $objUser = User::updateOrCreate(['email' => $requestData['email'], 'name' => $requestData['name']], $requestData );
            ##store data in patient details table
            $objPatientDetails = $objUser->fn_patient_details()->updateOrCreate(['user_id' => $objUser->id ], $requestData); 
            
            ##store data in patient enquiry table
            $objPatientEnquiry = $objUser->fn_patient_enquiry_details()->updateOrCreate(['user_id' => $objUser->id, 'cancer_id' => $requestData['cancer_id'] ], $requestData);
            // fn_patient_enquiry_data

            ##store all files in document enquiry_document table
            if(!empty($request['document_file']))
            {
                foreach ($request['document_file'] as $key => $value) {
                    $str_doc_name = store_file('upload-document',$value);
                    $objPatientEnquiry->fn_patient_enquiry_document()->create(['document_name' => $str_doc_name]);
                }
            }
            
            DB::commit();
            Flash::success("Enquiry has been successfully added")->important();
            return redirect('/');
            
        } catch (Exception $e) {
            DB::rollback();
            Flash::error("Oops! Something went wrong ". $e->getMessage() )->important();
            return redirect()->back()->withInput(request()->all());   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
