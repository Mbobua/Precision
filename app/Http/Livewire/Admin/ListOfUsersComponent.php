<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ListOfUsersComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.list-of-users-component')->layout('layouts.support-admin-dashboard');
    }
}
