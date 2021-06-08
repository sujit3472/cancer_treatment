<?php

namespace App\Http\Controllers\Admin;

use DB;
use Flash;
use App\User;
use Exception;
use App\Model\CancerType;
use Illuminate\Http\Request;
use App\Mail\DoctorCreationMail;
use App\Model\EnquiryPlanGenration;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\CreateDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objDoctors = User::where('role_id', 2)->latest()->get();
        return view('admin.doctor.index', compact('objDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrCancerType = CancerType::get()->pluck('name', 'id')->toArray();
        return view('admin.doctor.create', compact('arrCancerType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDoctorRequest $request)
    {
        $requestData = $request->all();
        try {
            $password                = fn_generate_number(6);
            $requestData['role_id']  = '2';
            $requestData['password'] = bcrypt($password);
        
            DB::beginTransaction();
                $objUser = User::create($requestData);
                $objUser->user_password = $password;
                ##send the mail to the user
                Mail::to($objUser->email)->send(new DoctorCreationMail($objUser));
            DB::commit();
            Flash::success("Doctor added successfully")->important();
            return redirect('admin/doctors');
        } catch (Exception $e) {
            DB::rollback();
            Flash::error("Oops! Something went wrong - " .$e->getMessage()  )->important();
            return redirect()->back()->withInput(request()->all());
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objDoctor = User::where([['id', $id], ['role_id', '2']])->first();
        if(empty($objDoctor))
            return redirect('admin/doctors');

        $arrCancerType = CancerType::get()->pluck('name', 'id')->toArray();

        return view('admin.doctor.edit', compact('objDoctor', 'arrCancerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateDoctorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        $requestData = $request->all();
        try {
            DB::beginTransaction();
                $objDoctor = User::updateOrCreate(['id' => $id], $requestData);
            DB::commit();
            Flash::success("Doctor details updated successfully")->important();
            return redirect('admin/doctors');
        } catch (Exception $e) {
            DB::rollback();
            Flash::error("Oops! Something went wrong")->important();
            return redirect()->back()->withInput(request()->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objDoctor = User::where([['id', $id], ['role_id', '2']])->first();
        if(empty($objDoctor))
            return redirect('admin/doctors');

        ##check the doctor has any assigned case
        $objEnquiryPlanGenration = EnquiryPlanGenration::where('doctor_id', $id)->get();
        if(!empty($objEnquiryPlanGenration) && count($objEnquiryPlanGenration))
        {
            Flash::error("You can not delete the doctor beacuse of has assgined the Enquiry Plan has been created by doctor")->important();
            return redirect('admin/doctors');
        }    
        User::destroy($id);
        Flash::success("Doctor deleted successfully")->important();
        return redirect('admin/doctors');
    }
}
