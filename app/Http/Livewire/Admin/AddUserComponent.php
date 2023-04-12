<?php

namespace App\Http\Livewire\Admin;

use App\Models\Companies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddUserComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.add-user-component')->layout('layouts.support-admin-dashboard');
    }

    public function addUser(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make(12345678),
            'user_type' => $request->input('user_type')
        ]);

        Companies::find($request->input('company'))->users()->save($user);

        return redirect()->route('admin.list-of-users');
    }
}
