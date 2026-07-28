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
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('content:generate --limit=1')
            ->everyFiveMinutes()
            ->withoutOverlapping(30);

        $schedule->command('sitemap:create --function=sitemapPost')
            ->everyFiveMinutes()
            ->withoutOverlapping(30);

        $schedule->command('sitemap:create --function=sitemapPage')
            ->everyTenMinutes()
            ->withoutOverlapping(60);

        $schedule->command('convert:data --function=updatePost')
            ->everyTenMinutes()
            ->withoutOverlapping(120);

        $schedule->command('crawler:data --function=crawler_images')
            ->everyTenMinutes()
            ->withoutOverlapping(360);

        $schedule->command('sitemap:create --function=sitemap')
            ->daily()
            ->withoutOverlapping(1440);
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
