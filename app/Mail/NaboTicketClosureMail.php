<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NaboTicketClosureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $naboticket;

    public function __construct($naboticket)
    {
        $this->naboticket = $naboticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nabo Ticket Status Update!')->view('notification.nabo-ticket-closure-requester');
    }
}
