<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneProductStockListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneProductStockEvent $event)
    {
        Log::channel('admin')->info(UpdateOneProductStockEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneProductStockEvent::class, strval($event->item->id));
    }
}