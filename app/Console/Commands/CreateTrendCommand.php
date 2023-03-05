<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Trend\CreateTrend;
use Illuminate\Console\Command;

class CreateTrendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateTrend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Trend';

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
     * @return int
     */
    public function handle(CreateTrend $service)
    {
        $service->run($this);
        return 0;
    }
}
