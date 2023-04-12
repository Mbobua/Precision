<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenSecondTicketEScalation extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }


    public function build()
    {
        return $this->subject('2nd Reminder Notification')->view('notification.open-second-ticket-escalation')->with(['ticket' => $this->ticket]);
    }
}
