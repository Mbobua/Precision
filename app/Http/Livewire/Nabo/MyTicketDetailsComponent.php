<?php

namespace App\Http\Livewire\Nabo;

use App\Models\NaboTickets;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyTicketDetailsComponent extends Component
{
    public $ticket;

    public function mount(NaboTickets $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render(NaboTickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.nabo.my-ticket-details-component',compact('ticket', 'history'))->layout('layouts.support-nabo-dashboard');
    }
}
