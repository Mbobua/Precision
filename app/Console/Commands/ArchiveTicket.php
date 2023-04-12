<?php

namespace App\Console\Commands;

use App\Mail\ArchivedCancelledAlert;
use App\Mail\SecondEscalationAlert;
use App\Models\status;
use App\Models\Tickets;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ArchiveTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:archive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive tickets';

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
        $archive_ready = Tickets::whereHas('status', function ($q){
            $q->where('name', 'Solved')->orWhere('name', 'Cancelled');
        })->get();

        Log::info('Archive ready: ' . $archive_ready->count());

        foreach ($archive_ready as $ticket)
        {
            $archive_ready_time = DB::table('ticket_timestamps')
                ->where('ticket_id', $ticket->id)
                ->orWhere('new_status', 'Solved')
                ->orWhere('new_status', 'Cancelled')
                ->first()->created_at;

//            Log::info('Solve time: ' . $archive_ready_time);

            if (now()->diff($archive_ready_time)->h > 48)
            {
                DB::table('ticket_timestamps')->insert([
                    'ticket_id' => $ticket->id,
                    'old_status' => $ticket->status->name,
                    'new_status' => 'Archived',
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString()
                ]);

                $status = status::whereName('Archived')->first();
                $ticket->status()->associate($status);
                $ticket->save();

                Log::info('Ticket updated!');

            }
            Log::info('Success!');
        }
    }
}
