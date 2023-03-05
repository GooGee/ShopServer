<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneProductSkuListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneProductSkuEvent $event)
    {
        Log::channel('admin')->info(UpdateOneProductSkuEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneProductSkuEvent::class, strval($event->item->id));
    }
}