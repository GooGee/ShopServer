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
use Illuminate\Support\Facades\Log;

class ReviewOrderCommand extends Command
{
    const NO_ORDER_PRODUCT_FOUND = 'no order product found';
    const NO_DATA_IN_RESPONSE = 'no data in response';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReviewOrder';

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
            $this->error(self::NO_ORDER_PRODUCT_FOUND);
            Log::error(self::NO_ORDER_PRODUCT_FOUND);
            return 0;
        }

        $this->info('crawl rating');
        $product = $opcc->get(0)->productSku->product;
        $crawler->getRatingzz($product->id, $product->shopId);
        $response = json_decode($crawler->body);
        if (isset($response->data->ratings)) {
            $dt = now();
            $dt->addMinutes(rand(0, 111));
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
            $this->error(self::NO_DATA_IN_RESPONSE);
            Log::error(self::NO_DATA_IN_RESPONSE);
        }
        return 0;
    }
}
