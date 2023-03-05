<?php

declare(strict_types=1);

namespace App\Ad\Product\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneProductListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneProductEvent $event)
    {
        Log::channel('admin')->info(DeleteOneProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneProductEvent::class, strval($event->item->id));
    }
}