<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $command = [
        'App\Console\Commands\ExpiredCommand',
        'App\Console\Commands\MulaiCommand',
        'App\Console\Commands\SelesaiCommand',
        'App\Console\Commands\ExpjadwalCommand',
        'App\Console\Commands\ExpMemberCommand',
        'App\Console\Commands\PengingatMemberCommand',
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sewa:expired')->everyMinute();
        $schedule->command('jadwal:mulai')->everyMinute();
        $schedule->command('jadwal:selesai')->everyMinute();
        $schedule->command('jadwal:exp')->everyMinute();
        $schedule->command('member:exp')->everyMinute();
        $schedule->command('member:reminder')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
