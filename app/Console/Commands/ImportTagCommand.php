<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Setup\ImportTag;
use Illuminate\Console\Command;

class ImportTagCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportTag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Tag';

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
    public function handle(ImportTag $importTag)
    {
        $importTag->run($this);
        return 0;
    }
}