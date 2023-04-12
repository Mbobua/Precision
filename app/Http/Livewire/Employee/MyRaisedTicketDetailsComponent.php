<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyRaisedTicketDetailsComponent extends Component
{

    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render(Tickets $ticket)
    {
        $history = DB::table('ticket_timestamps')->get();

        return view('livewire.employee.my-raised-ticket-details-component', compact('ticket', 'history'))->layout('layouts.support-admin-dashboard');
    }

}
