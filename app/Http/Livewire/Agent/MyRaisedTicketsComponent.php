<?php

namespace App\Http\Livewire\Agent;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyRaisedTicketsComponent extends Component
{
    public function render(Tickets $ticket)
    {
        // Fetch user object
        $solved_ticket = Auth::user()->requested;
        $new = [];
        $open = [];
        $in_progress = [];
        $on_hold = [];
        $temporarily_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];
        $reopened = [];

        $solved_ticket->each(function ($item) use (&$new, &$open, &$in_progress, &$on_hold, &$temporarily_solved, &$cancelled, &$solved, &$archived, &$reopened) {
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
        return view('livewire.agent.my-raised-tickets-component', compact('solved_ticket', 'new', 'open', 'in_progress', 'on_hold', 'temporarily_solved', 'cancelled', 'solved', 'archived', 'reopened'))->layout('layouts.support-agent-dashboard');
    }
}
