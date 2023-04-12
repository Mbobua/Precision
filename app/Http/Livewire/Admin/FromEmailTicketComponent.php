<?php

namespace App\Http\Livewire\Admin;

use App\Models\status;
use App\Models\Tickets;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Webklex\IMAP\Facades\Client;

class FromEmailTicketComponent extends Component
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

    public function render()
    {
        try {
            $client = Client::account('gmail');

            $client->connect();

            $folder = $client->getFolder('INBOX');

            // Generates a collection
            $message = $folder->query()
                //an array of domains
                ->from('/@tierdata.co.ke$/', '/@nabocapital.com$/')
                //run cron job every minute.
                ->since(now()->subDay())
                ->unseen()
                ->markAsRead()
                ->get();

//            Log::info(print_r($message));

            foreach ($message as $email) {
                $user_email = $email->getFrom();
                $user_sender = $email->getSender();
                $user_subject = $email->getSubject();
                $user_content = $email->getTextBody();

                $ticket = new Tickets([
                    'subject' => $user_subject,
                    'description' => $user_content,
                ]);
                $status = status::whereName('New')->first();
                $ticket->status()->associate($status);
                $ticket->save();
            }

        } catch (Exception $e) {
            Log::error($e);
        }
        return view('livewire.admin.from-email-ticket-component')->layout('layouts.support-admin-dashboard');

    }
}
