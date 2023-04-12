<?php

namespace App\Http\Livewire\Agent;

use App\Charts\TicketsChart;
use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AgentTicketReportsComponent extends Component
{
    public function render()
    {

        $tickets = Auth::user()->solved()
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

        return view('livewire.agent.agent-ticket-reports-component', compact('chart1'))->layout('layouts.support-agent-dashboard');
    }
}
