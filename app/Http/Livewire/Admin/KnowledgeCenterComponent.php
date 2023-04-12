<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class KnowledgeCenterComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.knowledge-center-component')->layout('layouts.support-admin-dashboard');;
    }
}
