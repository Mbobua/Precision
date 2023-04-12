<?php

namespace App\Http\Livewire\Admin;

use App\Charts\TicketsChart;
use App\Models\Tickets;
use App\Models\User;
use Livewire\Component;

class TicketReportsComponent extends Component
{
    public function render()
    {
        $tickets_per_user = Tickets::whereHas('status', function($query){
            $query->whereNotIn('name', array( 'Solved', 'Cancelled','Archived'));
        })->with('solver')->get()->groupBy('solver.name');


        $labels = $values = array();

        foreach ($tickets_per_user as $k => $v)
        {
            $labels[] = $k;
            $values[] = $v->count();
        }

        $chart2 = new TicketsChart();

        $chart2->labels($labels)->dataset(
            'Tickets per Agent',
            'bar',
            $values
        )->backgroundcolor('red');


        ######################################

        $tickets = Tickets::with('status')
            ->get()
            ->groupBy('status.name');


        $labels = $values = array();

        foreach ($tickets as $k => $v)
        {
            $labels[] = $k;
            $values[] = $v->count();
        }

        $chart1 = new TicketsChart();

        $chart1->labels($labels)->dataset(
            'Tickets per Status',
            'bar',
            $values
        )->backgroundcolor('#4b49ac');

        return view('livewire.admin.ticket-reports-component', compact('chart1', 'chart2'))->layout('layouts.support-admin-dashboard');
    }
}
