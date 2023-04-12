<?php

namespace App\Http\Controllers;

use App\Mail\ReOpenedNotificationtoAdmin;
use App\Models\status;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TicketReOpeningController extends Controller
{
    public function reopenTicket(Request $request, Tickets $ticketItem)
    {
        // Fetch the current status before performing any operation on the ticket model
        $old_status = $ticketItem->status->name;

        //Fetch the new status from the UI or any other method being used
        $new_status = $request->input('optionsRadios');

        //Request for reopening reason
        $ticketItem->update([
            'reopening_reason' => $request->input('reopening_reason')
        ]);

        $ticketItem->refresh()->status()->associate(status::whereName($request->input('optionsRadios'))->first())->save();

        $ticketItem->update(['reopening_status' => true]);

        if ($ticketItem->status->name == 'Re-Opened'){
            Mail::to($ticketItem->requester->email)->send(new ReOpenedNotificationtoAdmin($ticketItem));
        }
        // Update the tickets timestamps table after the main ticket model has been updated to ensure the record makes sense
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticketItem->id,
            'user_id' => Auth::user()->name,
            'old_status' => $old_status,
            'new_status' => $new_status,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        return back();
    }
}
