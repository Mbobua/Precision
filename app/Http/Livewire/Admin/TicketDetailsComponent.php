<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TicketDetailsComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.ticket-details-component')->layout('layouts.support-admin-dashboard');
    }
}
