<?php

namespace App\Http\Livewire\Agent;

use App\Mail\AdminCompanyProfileUpdate;
use App\Mail\AgentCompanyProfileUpdate;
use App\Models\Companies;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AgentSettingsComponent extends Component
{
    public function render()
    {
        $avg = Review::query()
            ->whereRelation('ticket', 'rstatus', 1) // query rated tickets
            ->whereRelation('ticket.solver', 'id', \auth()->id()) // query tickets assigned to current user
            ->avg('rating');
        return view('livewire.agent.agent-settings-component', compact('avg'))->layout('layouts.support-agent-dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->session()->reflash();
        $phone = $request->input('phone_number');
        $company = $request->input('company_name');

        $user = Auth::user();

        if ($phone != null)
        {
            $user->update(['phone_number' => $phone]);
        }

        // Save company
        $company = Companies::find($company);

        if ($company != null)
        {
            $user->company()->associate($company);
            $user->save();
            Mail::to(Auth::user()->email)->send(new AgentCompanyProfileUpdate($user));

        }
        return redirect()->back();
    }
}
