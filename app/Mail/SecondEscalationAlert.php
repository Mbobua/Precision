<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SecondEscalationAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }


    public function build()
    {
        return $this->subject('2nd Reminder Notification')->view('notification.new-status-second-escalation')->with(['ticket' => $this->ticket]);
    }
}
