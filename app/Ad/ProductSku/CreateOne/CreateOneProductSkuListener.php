<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneProductSkuListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneProductSkuEvent $event)
    {
        Log::channel('admin')->info(CreateOneProductSkuEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneProductSkuEvent::class, strval($event->item->id));
    }
}