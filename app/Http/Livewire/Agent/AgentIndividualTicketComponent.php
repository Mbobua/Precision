<?php

namespace App\Http\Livewire\Agent;

use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgentIndividualTicketComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }
    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.agent.agent-individual-ticket-component', compact('ticket', 'history'))->layout('layouts.support-agent-dashboard');
    }
}
