<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;
use App\Cookiee;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\InactiveUser::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:inactiveUsers')->da();

        $schedule->call(function () {
            Cookiee::insert([
                'cookie_string' => 'Day la title bai viet',
                'created_at' => Carbon::now(),
            ]);
        })->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
