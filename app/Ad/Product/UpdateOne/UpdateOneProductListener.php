<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneProductListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneProductEvent $event)
    {
        Log::channel('admin')->info(UpdateOneProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneProductEvent::class, strval($event->item->id));
    }
}