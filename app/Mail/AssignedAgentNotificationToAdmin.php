<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignedAgentNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket=$ticket;
    }

    public function build()
    {
        return $this->subject('New Ticket Request!')->view('notification.notification-to-admin-as-user-on-assigned-agent');
    }
}
