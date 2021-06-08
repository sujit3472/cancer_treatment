<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoctorCreationMail extends Mailable
{
    //use Queueable, SerializesModels;
    public $userDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDetails)
    {
        $this->userDetails = $userDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $strSubject = 'Online Cancer Treatment | Doctor Login Details';
        
        return $this->subject($strSubject)->view('email.doctor')
        ->with([
            'name' => $this->userDetails->name,
            'msg'  => "We have added to our portal Please login using below Details",
            'user_name' => $this->userDetails->email ?? '',
            'user_password' => $this->userDetails->user_password ?? '',
        ]);
    }
}
