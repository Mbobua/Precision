<?php

namespace App\Console;

use App\Console\Commands\ArchiveTicket;
use App\Console\Commands\EscalateNewTicket;
use App\Http\Controllers\SupportCheckCron;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SupportCheckCron::class,
        EscalateNewTicket::class,
        ArchiveTicket::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('support:update')->everyMinute();
//        $schedule->command('ticket:escalate')->everyMinute()->withoutOverlapping();
        $schedule->command('ticket:archive')->everyMinute();

    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
