<?php

namespace App\Http\Livewire\Nabo;

use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TierDataTicketDetailsComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }
    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.nabo.tier-data-ticket-details-component', compact('ticket', 'history'))->layout('layouts.support-nabo-dashboard');
    }
}
