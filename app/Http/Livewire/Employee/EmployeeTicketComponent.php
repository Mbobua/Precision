<?php

namespace App\Http\Livewire\Employee;

use App\Models\Tickets;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EmployeeTicketComponent extends Component
{
    public function render()
    {
        return view('livewire.employee.employee-ticket-component')->layout('layouts.support-employee-dashboard');
    }


}
