<?php

namespace App\Console\Commands;

use App\Mail\EscalationMail;
use App\Mail\OpenFirstTicketEScalation;
use App\Mail\OpenSecondTicketEScalation;
use App\Mail\OpenThirdTicketEScalation;
use App\Mail\RequesterFirstNotification;
use App\Mail\SecondEscalationAlert;
use App\Mail\ThirdEscalation;
use App\Models\Tickets;
use App\Models\User;
use App\Models\Timestamp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EscalateNewTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:escalate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Escalate unassigned tickets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch tickets that have not been assigned yet
        $new_tickets = Tickets::whereHas('status', function ($q) {
            $q->where('name', 'New');
        })->get();

//        Log::info('New tickets: ' . $new_tickets->count());

        // Fetch tickets that are open
        $open_tickets = Tickets::whereHas('status', function ($q) {
            $q->where('name', 'Open');
        })->get();

//        Log::info('Open tickets: ' . $new_tickets->count());

        // Fetch tier one users to escalate to
        $tier_one_users = User::whereHas('tier', function ($q) {
            $q->where('tier_name', 'Tier-One');
        })->get();

        Log::info('Tier 1 users: ' . $tier_one_users->count());

        // Fetch tier two users to escalate to
        $tier_two_users = User::whereHas('tier', function ($q) {
            $q->where('tier_name', 'Tier-Two');
        })->get();

        Log::info('Tier 2 user: ' . $tier_two_users->count());

        // Fetch tier three users to escalate to
        $tier_three_users = User::whereHas('tier', function ($q) {
            $q->where('tier_name', 'Tier-Three');
        })->get();

        Log::info('Tier 3 user: ' . $tier_three_users->count());

        try {
            // Loop through each new ticket found and escalate
            foreach ($new_tickets as $ticket) {
                // Escalate to tier three users
                if (now()->diff($ticket->created_at)->i == 0) {
                    foreach ($tier_three_users as $user) {
                        Mail::to($user->email)
                            ->send(new EscalationMail($ticket));
                    }

                    Log::info('Tier 3 sent');
                }

                // Escalate to tier two users
                if (now()->diff($ticket->created_at)->i == 0) {
                    // Send to all tier twos
                    foreach ($tier_two_users as $user) {
                        Mail::to($user->email)
                            ->cc($tier_two_users->pluck('email'))
                            ->send(new SecondEscalationAlert($ticket));
                    }

                    Log::info('Tier 2 sent');
                }
                // Escalate to tier one users
                if (now()->diff($ticket->created_at)->i == 0) {
                    foreach ($tier_one_users as $user) {
                        Mail::to($user->email)
                            ->cc($tier_one_users->pluck('email'))
                            ->send(new ThirdEscalation($ticket));
                    }

                    Log::info('Tier 1 sent');
                }
            }

            //Open Tickets
            foreach ($open_tickets as $ticket) {
                $open_time = DB::table('ticket_timestamps')
                    ->where('ticket_id', $ticket->id)
                    ->where('old_status', 'New')
                    ->where('new_status', 'Open')
                    ->first()->created_at;

                // Escalate to tier three users
                if (now()->diff($open_time)->i == 0) {
                    Mail::to($ticket->solver->email)
                        ->send(new OpenFirstTicketEScalation($ticket));

                    Log::info('Solver sent with tier 3 CC');
                }

                // Escalate to tier two users
                if (now()->diff($open_time)->i == 0) {
                    Mail::to($ticket->solver->email)
                        ->cc($tier_two_users->pluck('email'))
                        ->send(new OpenSecondTicketEScalation($ticket));

                    Log::info('Solver sent with tier 2 CC');
                }
                // Escalate to tier one users
                if (now()->diff($open_time)->i == 0) {
                    foreach ($tier_one_users as $user) {
                        Mail::to($ticket->solver->email)
                            ->cc($tier_one_users->pluck('email'))
                            ->send(new OpenThirdTicketEScalation($ticket));

//                        Mail::to($assigned_user->email)->cc(['support@centum.co.ke','e.mwendwa@centum.co.ke'])->send(new SecondEscalationAlert($ticket));
                    }

                    Log::info('Solver sent with tier 1 CC');
                }
            }
        } catch (\Exception $e) {
            Log::error($e);
        }


//        return Command::SUCCESS;
    }
}
