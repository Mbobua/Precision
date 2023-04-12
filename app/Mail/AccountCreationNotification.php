<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $newUser;
    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    public function build()
    {
        return $this->subject('New Support Desk Account!')->view('notification.new-user-account');
    }
}
