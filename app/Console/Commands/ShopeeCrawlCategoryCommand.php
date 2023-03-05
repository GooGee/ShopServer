<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Service\Shopee\ImportCategory;
use App\Service\Shopee\ShopeeCrawler;
use Illuminate\Console\Command;

class ShopeeCrawlCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopee:crawlCategory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawl Shopee Category';

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
    public function handle(ShopeeCrawler $crawler, ImportCategory $importCategory)
    {
        $this->info($this->description);
        $crawler->getCategory();
        $this->info('write to file');
        $importCategory->write($crawler->body);
        return 0;
    }
}
