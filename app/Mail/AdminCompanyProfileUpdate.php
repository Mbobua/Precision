<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminCompanyProfileUpdate extends Mailable
{
    use Queueable, SerializesModels;


    public $user;

    public function __construct($user)
    {
        $this->user=$user;
    }

    public function build()
    {
        return $this->subject('Precision Desk Profile Update!')->view('notification.admin-company-profile-update')->with(['user' => $this->user]);
    }
}
