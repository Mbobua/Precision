<?php

namespace App\Http\Controllers;

use App\Mail\NewUserEmailAlertMail;
use App\Mail\RaisedTicketMail;
use App\Mail\RequesterFirstNotification;
use App\Models\status;
use App\Models\Tickets;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Webklex\IMAP\Facades\Client;
use function data_get;
use function now;

class SupportCheckCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'support:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check support email for new issue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function createOutlookTicket(Request $request)
    {

        $email = $request->email;
        $subject = $request->subject;
        $name = $request->name;
        $message = $request->message;

        $requester = User::firstOrCreate([
            'email' => $email,
            'name' => $name,
            'password' => 'secret'
        ]);

        $ticket = new Tickets([
            'subject' => $subject,
            'description' => $message,
        ]);
        $status = status::whereName('New')->first();
        $ticket->requester()->associate($requester);
        $ticket->status()->associate($status);
        $ticket->save();

        // Set status
        DB::table('ticket_timestamps')->insert([
            'ticket_id' => $ticket->id,
            'user_id' => $ticket->requester->name,
            'old_status' => 'None',
            'new_status' => 'New',
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        return response()->json(["statusCode" => 200, "message" => ""]);

    }

    public function handle()
    {
//        return Command::SUCCESS;
        try {
            $client = Client::account('gmail');

            $client->connect();

            $client->checkFolder($folder = 'INBOX.name');

            $folder = $client->getFolder('INBOX');

            // Generates a collection
            $message = $folder->query()
                //an array of domains
                ->from('/@tierdata.co.ke$/')
                //run cron job every minute.
                ->since(now()->subDay())
                ->unseen()
                ->markAsRead()
                ->get();

//            Log::info(count($message));
            foreach ($message as $email) {

                Log::error("Email: " . $email->getFrom()[0]->mail);

                $user_email = $email->getFrom()[0]->mail;
                $user_name = $email->getUsername();
                $user_sender = $email->getSender();
                $user_subject = $email->getSubject();
                $user_content = $email->getTextBody();

                $requester = User::firstOrCreate([
                    'email' => $email->getFrom()[0]->mail,
                    'name' => data_get($email->getFrom(), '0.personal'),
                    'password' => 'secret'
                ]);

                $ticket = new Tickets([
                    'subject' => $user_subject,
                    'description' => $user_content,
                ]);

                $status = status::whereName('New')->first();
                $ticket->requester()->associate($requester);
                $ticket->status()->associate($status);
                $ticket->save();

                // Set status
                DB::table('ticket_timestamps')->insert([
                    'ticket_id' => $ticket->id,
                    'user_id' => $ticket->requester->name,
                    'old_status' => 'None',
                    'new_status' => 'New',
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString()
                ]);

//                Mail::to('support@centum.co.ke')
//                    ->cc('k.odhiambo@centum.co.ke')
//                    ->send(new RaisedTicketMail($ticket));

                if ($requester->wasRecentlyCreated) {
                    Mail::to($ticket->requester->email)->send(new NewUserEmailAlertMail($ticket));
                }
                Mail::to($ticket->requester->email)->send(new RequesterFirstNotification($ticket));

            }


            Log::info('Done');

        } catch (Exception $e) {
            Log::error($e);
        }

    }
}
