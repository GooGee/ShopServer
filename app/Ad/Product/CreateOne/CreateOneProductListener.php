<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneProductListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneProductEvent $event)
    {
        Log::channel('admin')->info(CreateOneProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneProductEvent::class, strval($event->item->id));
    }
}