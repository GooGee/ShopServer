<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\CancelOrderCommand;
use App\Console\Commands\CreateOrderCommand;
use App\Console\Commands\CreateTrendCommand;
use App\Console\Commands\CreateUserCommand;
use App\Console\Commands\CreateVoucherCommand;
use App\Console\Commands\FulfillOrderCommand;
use App\Console\Commands\PayOrderCommand;
use App\Console\Commands\ReceiveOrderCommand;
use App\Console\Commands\ReviewOrderCommand;
use App\Console\Commands\ShopeeCrawlProductCommand;
use App\Service\Setup\AppSetup;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (Storage::disk('root')->exists(AppSetup::LockFile)) {
            // ok
        } else {
            return;
        }

        $dtStart = config('app.dtStart');
        $dtEnd = config('app.dtEnd');
        $optionzz = [];
        if ($this->app->isProduction()) {
            $optionzz = ['--s'];
        }
        $schedule->command(CreateUserCommand::class, $optionzz)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();
        $schedule->command(CancelOrderCommand::class, $optionzz)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();
        $schedule->command(CreateOrderCommand::class, $optionzz)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();
        $schedule->command(PayOrderCommand::class, $optionzz)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();
        $schedule->command(ReceiveOrderCommand::class, $optionzz)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();

        $schedule->command(ReviewOrderCommand::class)->everyTwoHours()->between($dtStart, $dtEnd)->withoutOverlapping();

        $schedule->command(FulfillOrderCommand::class)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();

        $schedule->command(CreateVoucherCommand::class)->everyMinute()->between($dtStart, $dtEnd)->withoutOverlapping();

        $schedule->command(CreateTrendCommand::class)->dailyAt('01:00')->withoutOverlapping();
        $schedule->command(ShopeeCrawlProductCommand::class)->twiceDaily(2, 3)->withoutOverlapping();
    }

    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'Asia/Singapore';
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
