<?php

namespace App\Http\Controllers;

use App\Mail\AdminTicketCancelled;
use App\Mail\AgentTicketCancelled;
use App\Mail\DefaultUserTicketCancelled;
use App\Mail\TicketClosure;
use App\Mail\TicketStatusNotification;
use App\Models\status;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketsController extends Controller
{
    public function updateStatus(Request $request, Tickets $ticket)
    {
        // Fetch the current status before performing any operation on the ticket model
        $old_status = $ticket->status->name;

        //Fetch the new status from the UI or any other method/function being used
        $new_status = $request->input('optionsRadios');

        $ticket->update([
            'admin_reason' => $request->input('admin_reason')
        ]);

        $ticket->refresh()->status()->associate(status::whereName($request->input('optionsRadios'))->first())->save();


        if ($ticket->status->name == 'Solved') {

            Mail::to($ticket->requester->email)->send(new TicketClosure($ticket));

        } else if ($ticket->status->name == 'Cancelled') {

            if ($ticket->requester->user_type == 'Administrator') {

                Mail::to($ticket->requester->email)->send(new AdminTicketCancelled($ticket));

            } else if ($ticket->requester->user_type == 'Agent') {

                Mail::to($ticket->requester->email)->send(new AgentTicketCancelled($ticket));

            } else {

                Mail::to($ticket->requester->email)->send(new DefaultUserTicketCancelled($ticket));
            }

        } else {
            Mail::to($ticket->requester->email)->send(new TicketStatusNotification($ticket));
        }

        // Update the tickets timestamps table after the main ticket model has been updated to ensure the record makes sense
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->name,
            'old_status' => $old_status,
            'new_status' => $new_status,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        return redirect('/admin/dashboard/my-assigned-tickets');
    }

}
