<?php

namespace App\Http\Livewire;

use App\Models\Companies;
use Livewire\Component;

class CompanyComponent extends Component
{
    public function render()
    {
        $companies = Companies::orderBy('id', 'ASC')
            ->get();
        return view('livewire.company-component', compact('companies'))->layout('layouts.support-admin-dashboard');
    }

}
