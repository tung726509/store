<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\User;
use Illuminate\Notifications\Notification;
use App\Notifications\NotifyInactiveUser;

class InactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactiveUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'gửi email đến user đã không còn hoạt động trong 7 ngày';

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
     * @return mixed
     */
    public function handle()
    {
        $limit = Carbon::now()->subDay(7);
        $inactive_user = User::where('last_login', '<', $limit)->get();
        foreach ($inactive_user as $user) {
            $user->notify(new NotifyInactiveUser());
        }
    }
}
