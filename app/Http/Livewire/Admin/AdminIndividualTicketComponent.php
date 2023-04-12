<?php

namespace App\Http\Livewire\Admin;

use App\Models\Review;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminIndividualTicketComponent extends Component
{
    public $ticket_id;
    public $rating;
    public $comment;

    public function mount($ticket_id)
    {
        $this->ticket_id = $ticket_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'comment' => 'required'
        ]);
    }

    public function addReview(Request $request)
    {
        $rating = $request->input('rating');

        $comment = $request->input('comment');

        DB::beginTransaction();

        $review = new Review([
            'rating' => $rating,
            'comment' => $comment,
        ]);

        $ticket = Tickets::find($request->input('ticket_id'));

        $ticket->update(['rstatus' => 1]);

        $review->ticket()->associate($ticket);

        $review->save();

        DB::commit();

        return back();
    }

    public function render()
    {
        $ticketItem = Tickets::find($this->ticket_id);
        $history = DB::table('ticket_timestamps')->get();

        return view('livewire.admin.individual-ticket-component', compact('ticketItem', 'history', 'ticketItem'))->layout('layouts.support-admin-dashboard');

    }


}
