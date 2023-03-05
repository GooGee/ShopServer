<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Setup\AlterTable;
use Illuminate\Console\Command;

class SetTableIdCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetTableId';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Table Id';

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
    public function handle(AlterTable $alterTable)
    {
        $alterTable->run();
        $this->info('ok');
        return 0;
    }
}
