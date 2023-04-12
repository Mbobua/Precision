<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ManageUsersComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-users-component')->layout('layouts.support-admin-dashboard');
    }
}
