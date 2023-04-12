<?php

namespace App\Http\Livewire\Admin;

use App\Mail\AdminCustomEmailRequest;
use App\Mail\AgentCustomEmailRequest;
use App\Mail\CustomEmailRequest;
use App\Mail\RaisedTicketMail;
use App\Models\Category;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CustomRequestTicketComponent extends Component
{
    public function render()
    {
        $categories = Category::with('assets')->get();

        $users = User::where('user_type', 'Agent')->orWhere('user_type', 'Administrator')->get();

        return view('livewire.admin.custom-request-ticket-component', compact('users'), ['categories' => $categories])->layout('layouts.support-admin-dashboard');
    }

    public function submitCustomTicket(Request $request)
    {
        $request->session()->reflash();
        $requester_id = $request->input('requester_id');
        $subject = $request->input('subject');
        $asset_name = $request->input('asset_name');
        $incident_name = $request->input('incident_name');
        $description = $request->input('description');


        $ticket = new Tickets([
            'asset_name' => $asset_name,
            'issue' => $incident_name,
            'subject' => $subject,
            'description' => $description
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $ext = $file->getClientOriginalExtension();
            //Current time and file extension
            $filename = time() . '.' . $ext;
            $file->move('assets/attachment', $filename);
            $ticket->attachment = $filename;
        }

        $requester = User::find($requester_id);

        $status = status::whereName('New')->first();

        $ticket->requester()->associate($requester);

        $ticket->status()->associate($status);

        $ticket->save();

        // Set status
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->name,
            'old_status' => 'None',
            'new_status' => 'New',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);


        Mail::to('support@centum.co.ke')
            ->cc(['m.macharia@tierdata.co.ke','d.makori@tierdata.co.ke'])
            ->bcc(['k.odhiambo@centum.co.ke','v.nanjala@tierdata.co.ke'])
            ->send(new RaisedTicketMail($ticket));
            
        if ($ticket->requester->user_type == 'Administrator') {
            Mail::to($ticket->requester->email)->send(new AdminCustomEmailRequest($ticket));
        }

        else if ($ticket->requester->user_type == 'Agent') {
            Mail::to($ticket->requester->email)->send(new AgentCustomEmailRequest($ticket));

        }

        else{

            Mail::to($ticket->requester->email)->send(new CustomEmailRequest($ticket));

        }


            return redirect('/admin/dashboard')->with('message_sent', 'You have successfully created a custom ticket!');

        }
    }
