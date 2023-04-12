<?php

namespace App\Jobs;

use App\Mail\EscalationMail;
use App\Mail\RaisedTicketMail;
use App\Models\Tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckEscalationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        Tickets::query()->get()->map(function (Tickets $tickets) {
            $timestamps = $tickets->timestamps()->latest()->limit(2)->get();
            if ($timestamps->count()===0) {
                echo "Ticket has not been assigned";
           Mail::to('calvinsken89@gmail.com')
                   ->cc('ckodhiambo1@gmail.com')
                   ->send(new EscalationMail($tickets));
            } elseif (data_get($timestamps, '0.new_status') === 'New' && data_get($timestamps, '1.new_status') === 'New') {
                echo "Ticket has not been opened";
            }
        });
    }
}
