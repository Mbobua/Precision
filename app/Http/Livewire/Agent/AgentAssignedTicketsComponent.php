<?php

namespace App\Http\Livewire\Agent;

use App\Helpers\AfricasTalking\AfricasTalkingAPI;
use App\Mail\AdminAssignedAsSolver;
use App\Mail\AgentAssignedAsSolverEmail;
use App\Mail\AlertDelegationToRequester;
use App\Mail\AlertToAgentOnDelegation;
use App\Mail\AssignedAgentNotificationToAdmin;
use App\Mail\AssignedAgentNotificationToAgent;
use App\Mail\DelegatedNotification;
use App\Mail\NotificationToUserOnAssignedAgent;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AgentAssignedTicketsComponent extends Component
{
    public function render()
    {
        $myassignedtickets = Auth::user()->solved;

        $open = [];
        $in_progress = [];
        $on_hold = [];
        $temporarily_solved = [];
        $cancelled = [];
        $solved = [];
        $archived = [];
        $reopened = [];

        $myassignedtickets->each(function ($item) use (&$open, &$on_hold, &$in_progress, &$temporarily_solved, &$cancelled, &$solved, &$archived, &$reopened) {
            if ($item->status->name == 'Open') {
                $open[] = $item;
            }
            if ($item->status->name == 'In-Progress') {
                $in_progress[] = $item;
            }
            if ($item->status->name == 'On-Hold') {
                $on_hold[] = $item;
            }
            if ($item->status->name == 'Temporarily-Solved') {
                $temporarily_solved[] = $item;
            }
            if ($item->status->name == 'Cancelled') {
                $cancelled[] = $item;
            }
            if ($item->status->name == 'Solved') {
                $solved[] = $item;
            }
            if ($item->status->name == 'Archived') {
                $archived[] = $item;
            }
            if ($item->status->name == 'Re-Opened') {
                $reopened[] = $item;
            }
        });

        $solved_tickets = count($solved) + count($cancelled) + count($archived);

        $unsolved_tickets = count($temporarily_solved) + count($open) + count($in_progress) + count($on_hold) + count($reopened);


        return view('livewire.agent.agent-assigned-tickets-component', compact('unsolved_tickets', 'solved_tickets', 'myassignedtickets', 'open', 'in_progress', 'on_hold', 'temporarily_solved', 'cancelled', 'solved', 'archived', 'reopened'))->layout('layouts.support-agent-dashboard');
    }

    public function agentSetDelegatee(Request $request)
    {
        $user = User::find($request->input('agent'));

        $ticket = Tickets::find($request->input('ticket'));

        $old_status = $ticket->status->name;

        $new_status = 'Open';

        // Check for previous solver

        // Set to false means that the ticket is being assigned for the first time
        $previous_solver = false;

        if ($ticket->solver != null) {
            // if ticket->solver returns an object then there was a solver already assigned hence this is a delegation
            // Set to true to mean that the ticket is being delegated
            $previous_solver = true;
        }

        $ticket->solver()->associate($user);

        $ticket->status()->associate(status::whereName('Open')->first());

        $ticket->save();

        if ($request->input('phone_number') == 'true') {
            $at = new AfricasTalkingAPI();

            $response = $at->sms($user->phone_number, 'Precision Desk - Dear ' . $user->name . ', Ticket-id #5 from: ' . $ticket->requester->name . ' is an overdue ticket and has been escalated to you. The assigned agent is Kennedy Odhiambo (U-26). Kindly login to your portal for more info: https://desk.precision.ke/.');

            if ($response['status'] == 'success') {
                return back()->with('message_sent', 'An email and SMS notification has been sent successfully to the assigned agent!');
            }
        }
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->name,
            'old_status' => $old_status,
            'new_status' => $new_status,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        // if true then the ticket is being delegated
        if ($previous_solver) {
            // Send email with details on delegation
            Mail::to($ticket->solver->email)->send(new DelegatedNotification($ticket));

            if ($ticket->requester->user_type == 'Administrator') {
                Mail::to($ticket->requester->email)->send(new AlertDelegationToRequester($ticket));
            }
            if ($ticket->requester->user_type == 'Agent') {
                Mail::to($ticket->requester->email)->send(new AlertToAgentOnDelegation($ticket));
            }
            if ($ticket->requester->user_type == 'default_user') {
                Mail::to($ticket->requester->email)->send(new AlertDelegationToRequester($ticket));
            }

        }
        else {

            if ($ticket->requester->user_type == 'Administrator') {
                Mail::to($ticket->solver->email)->send(new AgentAssignedAsSolverEmail($ticket));
            } else {
                Mail::to($ticket->solver->email)->send(new AdminAssignedAsSolver($ticket));

            }

            if ($ticket->requester->user_type == 'default_user') {
                Mail::to($ticket->requester->email)->send(new NotificationToUserOnAssignedAgent($ticket));
            }

            if ($ticket->requester->user_type == 'Agent') {
                Mail::to($ticket->requester->email)->send(new AssignedAgentNotificationToAgent($ticket));
            }

            if ($ticket->requester->user_type == 'Administrator') {
                Mail::to($ticket->requester->email)->send(new AssignedAgentNotificationToAdmin($ticket));
            }

        }
        return back()->with('message_sent', 'The ticket has been successfully to delegated and an email sent!');

    }
}
