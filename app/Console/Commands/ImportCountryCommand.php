<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Setup\ImportCountry;
use Illuminate\Console\Command;

class ImportCountryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportCountry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Country';

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
    public function handle(ImportCountry $importCountry)
    {
        $importCountry->run($this);
        return 0;
    }
}