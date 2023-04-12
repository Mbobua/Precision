<?php

namespace App\Http\Livewire\Nabo;

use Livewire\Component;

class FirstUserPage extends Component
{
    public function render()
    {
        return view('livewire.nabo.first-user-page')->layout('layouts.support-nabo-dashboard');
    }
}
