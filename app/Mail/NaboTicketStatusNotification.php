<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NaboTicketStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $naboticket;

    public function __construct($naboticket)
    {
        $this->naboticket = $naboticket;
    }

    public function build()
    {
        return $this->subject('Nabo Precision Ticket Update!')->view('notification.nabo-ticket-status-update');

    }
}
