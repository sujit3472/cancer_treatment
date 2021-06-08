<?php

namespace App\Http\Controllers\Doctor;

use DB;
use URL;
use Auth;
use Flash;
use Exception;
use \Mpdf\Mpdf;
use Illuminate\Http\Request;
use App\Mail\PlanCreationMail;
use Illuminate\Support\Facades\Mail;
use App\Model\EnquiryPlanGenration;
use App\Http\Controllers\Controller;

class PlanGenrationController extends Controller
{
    public function fn_plan_generation(Request $request)
    {
    	$requestData = $request->all();
    	
    	try {
    		$requestData['doctor_id'] = Auth::user()->id;
    		DB::beginTransaction();
    		
			$objEnquiryPlanGenration = EnquiryPlanGenration::updateOrCreate(['patient_enquiry_id' => $requestData['patient_enquiry_id']],$requestData);
			
			if($objEnquiryPlanGenration->wasRecentlyCreated)  {
				##update the status in patient_enquiry table
				$response = $objEnquiryPlanGenration->fn_patient_enquiry_plan_genration_data->update(['status' => 1 ]);
				$responseData = self::fn_common_data($objEnquiryPlanGenration);
				$message = "Plan created successfully";

				DB::commit();
				##need to send and email to patient and need to create the pdf file
				Flash::success($message)->important();
				return redirect('doctor/patient-enquiry');
			}

    		
    		if($objEnquiryPlanGenration->wasChanged('description') == true) {
    			$response = self::fn_common_data($objEnquiryPlanGenration);
    			$message = "Plan updated successfully";
    			
    			DB::commit();
    			##need to send and email to patient and need to create the pdf file
    			Flash::success($message)->important();
    			return redirect('doctor/patient-enquiry');
    		}
    		$message = "Nothing updated";
    		Flash::success($message)->important();
    		return redirect('doctor/patient-enquiry');
    	} catch (Exception $e) {
    		DB::rollback();
    		Flash::error("Oops! Something went wrong - " .$e->getMessage()  )->important();
    		return redirect()->back()->withInput(request()->all());
    	}
    }

    /**
    * Function fn_common_data
    * Use for the send the mail to the users
    */
    private function fn_common_data($objEnquiryPlanGenration)
    {
		$path = storage_path('app/public/plan-document/');
		$mpdf = new Mpdf();

		$view = \View::make('pdf.plan_genration', ['data' => $objEnquiryPlanGenration]);
		$fileName = uniqid('pdf_').'.pdf';
		$mediaUrl = URL::to('/').'/storage/plan-document/'.$fileName;
		$mpdf->WriteHTML($view->render());
		$pdfOutput =  $mpdf->Output($path.$fileName,'F');
		
		$arr_file = [];
		if(isset($objEnquiryPlanGenration->file_name)&& is_array($objEnquiryPlanGenration->file_name)) {
			$intCnt = count($objEnquiryPlanGenration->file_name);
			$arr_file = $objEnquiryPlanGenration->file_name;
			$arr_file[$intCnt] = $fileName;
		} 
		else {
			$arr_file[0] = $fileName;
		}
		
		$objEnquiryPlanGenration->update(['file_name' => $arr_file ]);
		$patientEmail = $objEnquiryPlanGenration->fn_patient_enquiry_plan_genration_data->fn_patient_enquiry_data->email ?? '';

		$objEnquiryPlanGenration->mediaUrl  = $mediaUrl;
		$objEnquiryPlanGenration->pdfOutput = $pdfOutput;
		$objEnquiryPlanGenration->fileName  = $fileName;
		
		##send the mail to the user
        Mail::to($patientEmail)->send(new PlanCreationMail($objEnquiryPlanGenration));

        return;  
    }
}
