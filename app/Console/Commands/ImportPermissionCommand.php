<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Setup\ImportPermission;
use Illuminate\Console\Command;

class ImportPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportPermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Permission';

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
    public function handle(ImportPermission $importPermission)
    {
        $importPermission->run($this);
        return 0;
    }
}
