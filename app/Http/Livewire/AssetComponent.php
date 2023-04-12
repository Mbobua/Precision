<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use Livewire\Component;

class AssetComponent extends Component
{
    public function render()
    {
        $assets = Asset::orderBy('id', 'ASC')
            ->paginate(10);
        return view('livewire.asset-component',compact('assets'))->layout('layouts.support-admin-dashboard');
    }
}
