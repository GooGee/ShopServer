<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Product;
use App\Repository\ProductRepository;
use App\Service\Shopee\ShopeeCrawler;
use Illuminate\Console\Command;

class ShopeeCrawlProductDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopee:crawlProductDetail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawl Shopee Product Detail';

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
    public function handle(ShopeeCrawler     $crawler,
                           ProductRepository $productRepository,
    )
    {
        $product = $productRepository->query()->where('detail', Product::Detail)->first();
        if ($product) {
            $crawler->getProductDetail($product->id, $product->shopId);
            $response = json_decode($crawler->body);
            if (isset($response->data->description)) {
                $product->detail = $response->data->description;
                $product->save();
                $this->info('ok');
            } else {
                $this->error('no data in response');
            }
        } else {
            $this->error('no product in db');
        }
        return 0;
    }
}
