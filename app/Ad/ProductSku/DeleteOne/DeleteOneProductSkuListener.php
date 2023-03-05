<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneProductSkuListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneProductSkuEvent $event)
    {
        Log::channel('admin')->info(DeleteOneProductSkuEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneProductSkuEvent::class, strval($event->item->id));
    }
}