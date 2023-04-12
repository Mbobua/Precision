<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;

class AccountCenterComponent extends Component
{
    public function render()
    {
        return view('livewire.agent.account-center-component')->layout('layouts.support-agent-dashboard');
    }
}
