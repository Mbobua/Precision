<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReOpenedNotificationtoAdmin extends Mailable
{
    use Queueable, SerializesModels;


    public $ticketItem;

    public function __construct($ticketItem)
    {
        $this->ticketItem = $ticketItem;
    }

    public function build()
    {
        return $this->subject('Ticket Status Change Notification')->view('notification.reopened-ticket-notification-to-adm-as-requester')->with(['ticketItem' => $this->ticketItem]);
    }
}
