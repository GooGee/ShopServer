<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Setup\AppSetup;
use Illuminate\Console\Command;

class AppSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'setup app';

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
    public function handle(AppSetup $setup)
    {
        $setup->run($this);
        return 0;
    }
}
