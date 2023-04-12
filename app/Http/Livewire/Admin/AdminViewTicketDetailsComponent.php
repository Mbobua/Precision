<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function view;

class AdminViewTicketDetailsComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }
    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();
        return view('livewire.admin.admin-view-ticket-details-component', compact('ticket', 'history'))->layout('layouts.support-admin-dashboard');
    }
}
