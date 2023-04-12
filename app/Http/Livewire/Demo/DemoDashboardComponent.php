<?php

namespace App\Http\Livewire\Demo;

use Livewire\Component;

class DemoDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.demo.demo-dashboard-component')->layout('layouts.support-admin-dashboard');
    }
}
