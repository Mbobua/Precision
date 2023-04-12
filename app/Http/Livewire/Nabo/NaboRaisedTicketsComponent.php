<?php

namespace App\Http\Livewire\Nabo;

use App\Models\NaboTickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NaboRaisedTicketsComponent extends Component
{
    public $naboticket;

    public function mount(NaboTickets $naboticket)
    {
        $this->naboticket = $naboticket;
    }
    public function render()
    {
        // Fetch user object
        $solved_ticket = Auth::user()->naborequested;
        $new = [];
        $open = [];
        $in_progress = [];
        $on_hold = [];
        $partially_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];
        $solved_ticket ->each(function ($item) use (&$new, &$open, &$in_progress, &$on_hold, &$partially_solved, &$cancelled, &$solved, &$archived) {
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
            if ($item->status->name == 'Partially_Solved') {
                $partially_solved[] = $item;
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
        });
        return view('livewire.nabo.nabo-raised-tickets-component', compact('solved_ticket', 'new','open', 'in_progress','on_hold','partially_solved','cancelled','solved','archived'))->layout('layouts.support-nabo-dashboard');
    }
}
