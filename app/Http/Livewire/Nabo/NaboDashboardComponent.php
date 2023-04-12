<?php

namespace App\Http\Livewire\Nabo;

use App\Helpers\AfricasTalking\AfricasTalkingAPI;
use App\Mail\NaboRaisedTicketMail;
use App\Mail\NaboRequesterEmail;
use App\Models\Category;
use App\Models\Department;
use App\Models\NaboTickets;
use App\Models\status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NaboDashboardComponent extends Component
{
    public function render()
    {
        $departments = Department::where('company_id', '6')->get();
        $users = User::where('user_type', 'NaboStaff')->get();
        return view('livewire.nabo.nabo-dashboard-component', compact('users', 'departments'))->layout('layouts.support-nabo-dashboard');
    }

    public function submitTicket(Request $request)
    {
        $request->session()->reflash();
        $subject = $request->input('subject');
        $issue = $request->input('issue');
        $department_to = $request->input('department_to');
        $description = $request->input('description');
        $agent = $request->input('agent');
        $priority = $request->input('priority_name');
        $naboticket = new NaboTickets([
            'subject' => $subject,
            'issue' => $issue,
            'department_to' => $department_to,
            'description' => $description,
            'agent' => $agent,
            'priority_name' => $priority,
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $ext = $file->getClientOriginalExtension();
            //Current time and file extension
            $filename = time() . '.' . $ext;
            $file->move('assets/attachment', $filename);
            $naboticket->attachment = $filename;
        }

        $requester = Auth::user();

        $status = status::whereName('Open')->first();

        $naboticket->priority()->associate($priority);

        $naboticket->requester()->associate($requester);

        $naboticket->solver()->associate($agent);

        $naboticket->status()->associate($status);

        $naboticket->save();

        if ($request->input('phone_number') == 'true') {
            $at = new AfricasTalkingAPI();

            $response = $at->sms($agent->phone_number, 'Precision Desk - Dear ' . $agent->name . ', You have been assigned ticket-id #' . $naboticket->id . ' from: ' . auth()->user()->name . '. Kindly login to your portal for more info: support.tierdata.co.ke.');

            if ($response['status'] == 'success') {
                return back()->with('message_sent', 'An email and SMS notification has been sent successfully to the assigned agent!');
            }
        }

        // Set status
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $naboticket->id,
            'old_status' => 'New',
            'new_status' => 'Open',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        Mail::to(Auth::user()->email)->send(new NaboRequesterEmail($naboticket));

        Mail::to($naboticket->solver->email)->send(new NaboRaisedTicketMail($naboticket));

        return redirect('/nabocapital/raised-nb-tickets')->with('message_sent', 'Your ticket has been successfully raised and an email sent to the delegated agent!');
    }
}
