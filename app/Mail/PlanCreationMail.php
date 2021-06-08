<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlanCreationMail extends Mailable
{
    //use Queueable, SerializesModels;
    public $objEnquiryPlanGenration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objEnquiryPlanGenration)
    {
        $this->objEnquiryPlanGenration = $objEnquiryPlanGenration;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $strSubject = 'Online Cancer Treatment | Plan Details';
        
        return $this->subject($strSubject)
        ->with([
            'name' => $this->objEnquiryPlanGenration->fn_patient_enquiry_plan_genration_data->fn_patient_enquiry_data->name ?? '',
            'msg'  => "Doctor has checked with your case and given the plan for the treatment",
            'mediaUrl' => $this->objEnquiryPlanGenration->mediaUrl ?? '',
           
        ])->attachData($this->objEnquiryPlanGenration->pdfOutput, $this->objEnquiryPlanGenration->fileName)->view('email.plan-genartion');
    }
}
