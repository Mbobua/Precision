<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.home-component')->layout('layouts.index');
    }
}
