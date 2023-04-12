<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MySolvedTicketsComponent extends Component
{
    public $ticket;

    public function mount(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render(Tickets $ticket)
    {
        // Fetch user object
        $solved_ticket = Auth::user()->requested;
        $open = [];
        $in_progress = [];
        $on_hold = [];
        $temporarily_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];
        $reopened = [];

        $solved_ticket ->each(function ($item) use (&$open, &$in_progress, &$on_hold, &$temporarily_solved, &$cancelled, &$solved, &$archived, &$reopened) {
            if ($item->status->name == 'Open') {
                $open[] = $item;
            }
            if ($item->status->name == 'In-Progress') {
                $in_progress[] = $item;
            }
            if ($item->status->name == 'On-Hold') {
                $on_hold[] = $item;
            }
            if ($item->status->name == 'Temporarily-Solved') {
                $temporarily_solved[] = $item;
            }
            if ($item->status->name == 'Cancelled') {
                $cancelled[] = $item;
            }
            if ($item->status->name == 'Solved') {
                $solved[] = $item;
            }
            if ($item->status->name == 'Archived') {
                $archived[] = $item;
            }
            if ($item->status->name == 'Re-Opened') {
                $reopened[] = $item;
            }
        });

        return view('livewire.employee.tickets-component', compact('open', 'in_progress','on_hold','temporarily_solved','cancelled','solved','archived', 'reopened'))->layout('layouts.support-employee-dashboard');
    }
}
