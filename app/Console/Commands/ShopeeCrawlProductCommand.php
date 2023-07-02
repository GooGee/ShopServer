<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Category;
use App\Repository\CategoryRepository;
use App\Service\Shopee\ImportProduct;
use App\Service\Shopee\ShopeeCrawler;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class ShopeeCrawlProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopee:crawl {categoryId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawl Shopee Product';

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
    public function handle(ShopeeCrawler      $crawler,
                           ImportProduct      $importProduct,
                           CategoryRepository $categoryRepository,
    )
    {
        $categoryId = intval($this->argument('categoryId'));
        if ($categoryId === 0) {
            $category = $categoryRepository->query()
                ->where('parentId', '>', Category::RootId)
//                ->doesntHave('productzz')
                ->inRandomOrder()
                ->first();
            if (is_null($category)) {
                $this->error('no data in Category table');
                return 0;
            }
            $categoryId = $category->id;
        } else {
            if ($categoryRepository->query()->where('id', $categoryId)->exists()) {
                // ok
            } else {
                $this->error($categoryId . ' does no exist in Category table');
                return 0;
            }
        }

        $this->info('crawl Product in category: ' . $categoryId);
        $crawler->getProductzzByCategoryId($categoryId);
        $this->info('write to file');
        $importProduct->write($crawler->body);
        $importProduct->run($this, $categoryId);
        return 0;
    }
}
