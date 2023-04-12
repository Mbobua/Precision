<?php

namespace App\Http\Livewire\Nabo;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NaboAssignedTicketsComponent extends Component
{
    public function render()
    {
        $mynaboassignedtickets = Auth::user()->nabosolved;
        $open = [];
        $in_progress = [];
        $on_hold = [];
        $partially_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];

        $mynaboassignedtickets->each(function ($item) use (&$open, &$on_hold, &$in_progress, &$partially_solved, &$cancelled, &$solved, &$archived) {
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

        return view('livewire.nabo.nabo-assigned-tickets-component', compact('open', 'in_progress','partially_solved','cancelled','solved','archived'))->layout('layouts.support-nabo-dashboard');
    }
}
