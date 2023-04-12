<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tier;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render(User $user)
    {
        return view('livewire.admin.user-profile', compact('user'))->layout('layouts.support-admin-dashboard');
    }


}
