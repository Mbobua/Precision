<?php

namespace App\Http\Livewire\Employee;

use App\Mail\AdminCompanyProfileUpdate;
use App\Mail\DefaultCompanyProfileUpdate;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EmployeeSettingsComponent extends Component
{
    public function render()
    {
        return view('livewire.employee.employee-settings-component')->layout('layouts.support-employee-dashboard');
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
            Mail::to(Auth::user()->email)->send(new DefaultCompanyProfileUpdate($user));

        }
        return redirect()->back();
    }
}
