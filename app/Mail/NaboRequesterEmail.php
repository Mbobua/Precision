<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NaboRequesterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $naboticket;

    public function __construct($naboticket)
    {
        $this->naboticket = $naboticket;
    }
    public function build()
    {
        return $this->subject('New Nabo Ticket Request!')->view('notification.nabo-requester-email');
    }
}
