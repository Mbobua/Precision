<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyRaisedTicketComponent extends Component
{
    public $ticket_id;

    public function mount(Tickets $ticket_id)
    {
        $this->ticket_id = $ticket_id;
    }

    public function render()
    {
        // Fetch user object
        $raised_tickets = Auth::user()->requested;
        $new = [];
        $open = [];
        $in_progress = [];
        $on_hold = [];
        $temporarily_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];
        $reopened = [];

        $raised_tickets->each(function ($item) use (&$new, &$open, &$in_progress, &$on_hold, &$temporarily_solved, &$cancelled, &$solved, &$archived, &$reopened) {
            if ($item->status->name == 'New') {
                $new[] = $item;
            }
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

        $solved_tickets = count($solved) + count($cancelled) + count($archived);

        $unsolved_tickets = count($new) + count($temporarily_solved) + count($open) + count($in_progress) + count($on_hold) + count($reopened);

        return view('livewire.admin.my-raised-ticket-component', compact('raised_tickets', 'solved_tickets', 'unsolved_tickets', 'new', 'open', 'in_progress', 'on_hold', 'temporarily_solved', 'cancelled', 'solved', 'archived', 'reopened'))->layout('layouts.support-admin-dashboard');
    }
}
