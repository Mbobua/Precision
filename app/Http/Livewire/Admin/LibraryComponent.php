<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class LibraryComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.library-component')->layout('layouts.support-admin-dashboard');
    }
}
