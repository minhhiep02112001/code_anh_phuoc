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
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sitemap:create --function=sitemapPost')->everyFiveMinutes();
        $schedule->command('sitemap:create --function=sitemapPage')->daily();
        // $schedule->command('google_search:index --function=index_google')->daily();
        // $schedule->command('google_search:index --function=index_bing')->daily();
        $schedule->command('sitemap:create --function=sitemap')->daily();


        // $schedule->command('crawler:data --function=category')->everyFourHours();
        // $schedule->command('convert:data --function=renderStoryToCategory')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
