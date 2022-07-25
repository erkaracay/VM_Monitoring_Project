<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $servers = \App\Models\Server::all();
            foreach ($servers as $server) {
                $date = Carbon::parse($server->available_on);
                if ($date->isPast()) {
                    $server->availability = 1;
                    $server->user_id = null;
                    $server->available_on = null;
                    $server->save();
                }
            }
        })->daily();

        $schedule->call(function(){
            $servers = \App\Models\Server::all();
            foreach ($servers as $server) {
                $curlInit = curl_init("$server->ip");
                curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($curlInit, CURLOPT_HEADER, true);
                curl_setopt($curlInit, CURLOPT_NOBODY, true);
                curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($curlInit);
                curl_close($curlInit);

                if ($response) {
                    $server->running = 1;
                } else {
                    $server->running = 0;
                }
                $server->save();
            }
        })->everyFiveMinutes();
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
