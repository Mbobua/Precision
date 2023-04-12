<?php

namespace App\Http\Livewire\Admin;

use App\Mail\AdminAsRequester;
use App\Mail\AdminCompanyProfileUpdate;
use App\Mail\AdminPhoneProfileUpdate;
use App\Models\Companies;
use App\Models\Review;
use App\Models\Tickets;
use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use function view;

class UserSettingsComponent extends Component
{
    public function render()
    {
        $avg = Review::query()
            ->whereRelation('ticket', 'rstatus', 1) // query rated tickets
            ->whereRelation('ticket.solver', 'id', \auth()->id()) // query tickets assigned to current user
            ->avg('rating');

        return view('livewire.admin.user-settings-component', compact('avg'))->layout('layouts.support-admin-dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->session()
            ->reflash();
        $phone = $request->input('phone_number');
        $company = $request->input('company_name');

        $user = Auth::user();

        if ($phone != null) {
            $user->update(['phone_number' => $phone]);
        }

        // Save company
        $company = Companies::find($company);

        if ($company != null) {
            $user->company()
                ->associate($company);
            $user->save();
            Mail::to(Auth::user()->email)
                ->send(new AdminCompanyProfileUpdate($user));

        }

        return redirect()->back();
    }
}
