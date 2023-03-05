<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\ReviewOrderJob;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Review;
use App\Repository\OrderProductRepository;
use App\Service\AmountPerHour;
use App\Service\Shopee\ShopeeCrawler;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class ReviewOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReviewOrder {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Review Order';

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
    public function handle(ShopeeCrawler          $crawler,
                           OrderProductRepository $orderProductRepository,
    )
    {
        if ($this->option('s')) {
            if (AmountPerHour::with(1) === false || rand(0, 1)) {
                $this->info('skip');
                return 0;
            }
        }

        $opcc = $orderProductRepository->query()
            ->leftJoin('ProductSku', 'ProductSku.id', '=', 'OrderProduct.productSkuId')
            ->with(['order.user', 'productSku'])
            ->whereHas('order', function ($builder) {
                /** @var Builder $builder */
                $builder->whereIn('status', [Order::StatusReceived, Order::StatusReturned]);
            })
            ->doesntHave('productSku.product.reviewzz')
            ->orderBy('ProductSku.productId')
            ->limit(6)
            ->get();

        if ($opcc->isEmpty()) {
            $this->error('no product in db');
            return 0;
        }

        $this->info('crawl rating');
        $product = $opcc->get(0)->productSku->product;
        $crawler->getRatingzz($product->id, $product->shopId);
        $response = json_decode($crawler->body);
        if (isset($response->data->ratings)) {
            $dt = now();
            foreach ($response->data->ratings as $key => $data) {
                if ($key === $opcc->count()) {
                    break;
                }

                /** @type OrderProduct $op */
                $op = $opcc->get($key);
                auth()->login($op->order->user);
                if (mb_strlen($data->comment) === 0) {
                    $data->comment = Product::Detail;
                }
                $review = new Review();
                $review->userId = $op->order->userId;
                $review->productId = $product->id;
                $review->rating = $data->rating_star;
                $review->text = $data->comment;
                $review->soi = $data->orderid;
                ReviewOrderJob::dispatch((object)$review->toArray())->delay($dt->clone());
                $dt->addDay();
            }
            $this->info('ok');
        } else {
            $this->error('no data in response');
        }
        return 0;
    }
}
