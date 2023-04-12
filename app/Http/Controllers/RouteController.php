<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function home()
    {
        if (Auth::user())
        {
            if (Auth::user()->user_type == 'Administrator')
            {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->user_type == 'Agent')
            {
                return redirect()->route('ticket.agent-assigned-tickets');
            }
            if (Auth::user()->user_type == 'default_user')
            {
                return redirect()->route('employee.dashboard');
            }
            if (Auth::user()->user_type == 'NaboStaff')
            {
                return redirect()->route('nabostaff.dashboard');
            }
        }

        return redirect()->route('default-user.home');
    }

    public function editUser(Request $request)
    {
        $phone = $request->input('phone_number');
        $tier = $request->input('tier');
        $user_type = $request->input('user_type');

        $user = User::find($request->input('user_id'));

        $user->update(['phone_number' => $phone]);

        // Save tier
        $tier = Tier::find($tier);

        if ($tier != null)
        {
            $user->tier()->associate($tier);

            $user->save();
        }

        return redirect()->back();
    }
}
