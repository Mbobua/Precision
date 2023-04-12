<?php

namespace App\Http\Controllers;

use App\Mail\NaboTicketClosureMail;
use App\Mail\NaboTicketStatusNotification;
use App\Models\NaboTickets;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NaboTicketsController extends Controller
{
    public function updateStatus(Request $request, NaboTickets $ticket)
    {
        // Fetch the current status before performing any operation on the ticket model
        $old_status = $ticket->status->name;

        //Fetch the new status from the UI or any other method being used
        $new_status = $request->input('optionsRadios');

        $ticket->update([
            'agent_reason' => $request->input('description')
        ]);

        $ticket->refresh()->status()->associate(status::whereName($request->input('optionsRadios'))->first())->save();

        if ($ticket->status->name == 'Solved')
        {
            Mail::to($ticket->requester->email)->send(new NaboTicketClosureMail($ticket));
        }
        else
        {
            Mail::to($ticket->requester->email)->send(new NaboTicketStatusNotification($ticket));
        }

        // Update the tickets timestamps table after the main ticket model has been updated to ensure the record makes sense
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'old_status' => $old_status,
            'new_status' => $new_status,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        return redirect('/nabocapital/assigned-nb-tickets');
    }
}
