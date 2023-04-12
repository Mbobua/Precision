<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationToUserOnAssignedAgent extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket=$ticket;
    }

    public function build()
    {
        return $this->subject('New Ticket Request!')->view('notification.notification-to-user-on-assigned-agent');
    }
}
